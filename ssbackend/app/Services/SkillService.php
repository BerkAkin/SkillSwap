<?php

namespace App\Services;

use App\Contracts\ISkillService;
use App\Models\Skill;
use App\DTOs\SkillDTOs\StoreDTO;
use App\DTOs\SkillDTOs\UpdateDTO;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;

class SkillService implements ISkillService
{
    protected string $model = Skill::class;


    public function GetAll()
    {
        $params = $this->getListParams();
        $cacheKey = $this->createCacheKey($params);

        $skills = Cache::tags(['skills'])->remember($cacheKey, 300, function () use ($params) {
            return $this->model::where('name', 'ilike', "%{$params['search']}%")->orderBy($params['sort'])->paginate(1)->toArray();
        });

        $skills['data'] = Skill::hydrate($skills['data']);

        return new LengthAwarePaginator(
            $skills['data'],
            $skills['total'],
            $skills['per_page'],
            $skills['current_page'],
            [
                'path' => $skills['path'],
                'pageName' => 'page',
            ]
        );
    }

    public function Create(StoreDTO $DTO): Skill
    {
        $skill = $this->model::create([
            'name' => $DTO->name,
            'description' => $DTO->description,
        ]);

        Cache::tags(['skills'])->flush();

        return $skill;
    }
    public function Update(UpdateDTO $DTO): ?Skill
    {
        $skill = $this->Find($DTO->id);
        $skill->update([
            'name' => $DTO->name,
            'description' => $DTO->description,
        ]);

        Cache::forget("skills:$DTO->id");
        Cache::tags(['skills'])->flush();

        return $skill;
    }

    public function Destroy(int $id)
    {
        $this->Find($id)->delete();

        Cache::forget("skills:$id");
        Cache::tags(['skills'])->flush();
    }

    public function Find(int $id): ?Skill
    {
        $cacheKey = "skills:$id";
        $cached = Cache::get($cacheKey);
        if ($cached) {
            return Skill::hydrate([$cached])->first();
        }

        $lock = Cache::lock("skills:lock:$id", 10);

        try {
            $lock->block(5);

            $cached = Cache::get($cacheKey);

            if (!$cached) {
                $cached = $this->model::findOrFail($id)->toArray();
                Cache::put($cacheKey, $cached, 300);
            }

            return Skill::hydrate([$cached])->first();

        } finally {
            $lock->release();
        }

    }

    private function createCacheKey(array $params): string
    {
        $params = $this->getListParams();

        if ($params['search'] === '') {
            unset($params['search']);
        }

        return 'skills:' . http_build_query($params);
    }

    private function getListParams(): array
    {
        $search = strtolower(request()->get('search', ''));
        $page = intval(request()->get('page', 1));
        $sort = request()->get('sort', 'name');

        return [
            'search' => $search,
            'page' => $page,
            'sort' => $sort,
        ];
    }

}
