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
        $page = request()->get('page', 1);

        $cacheKey = "skills:page:$page";

        $skills = Cache::tags(['skills'])->remember($cacheKey, 300, function () {
            return $this->model::paginate(1)->toArray();
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
        $skill = Cache::remember("skills:$id", 300, function () use ($id) {
            return $this->model::findOrFail($id)->toArray();
        });

        return Skill::hydrate([$skill])->first();
    }

}
