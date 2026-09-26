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
        $search = strtolower(request()->get('search', ''));
        $sort = request()->get('sort', 'name');

        $cacheKey = $this->createCacheKey();

        $skills = Cache::tags(['skills'])->remember($cacheKey, 300, function () use ($search, $sort) {
            return $this->model::where('name', 'ilike', "%$search%")->orderBy($sort)->paginate(1)->toArray();
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

    private function createCacheKey(): string
    {
        $page = request()->get('page', 1);
        $search = strtolower(request()->get('search', ''));
        $sort = request()->get('sort', 'name');

        $params = [
            'page' => $page,
            'search' => $search,
            'sort' => $sort,
        ];

        if ($search === '') {
            unset($params['search']);
        }

        return 'skills:' . http_build_query($params);

    }

}
