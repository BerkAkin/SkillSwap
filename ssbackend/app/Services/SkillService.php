<?php

namespace App\Services;

use App\Contracts\ISkillService;
use App\Models\Skill;
use App\DTOs\SkillDTOs\StoreDTO;
use App\DTOs\SkillDTOs\UpdateDTO;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

class SkillService extends BaseService implements ISkillService
{
    protected string $model = Skill::class;


    public function GetAll(): Collection
    {
        $skills = Cache::remember('skills', 300, function () {
            return $this->model::all()->toArray();
        });

        return Skill::hydrate($skills);
    }

    public function Create(StoreDTO $DTO): Skill
    {
        $skill = $this->model::create([
            'name' => $DTO->name,
            'description' => $DTO->description,
        ]);
        Cache::forget('skills');
        return $skill;
    }
    public function Update(UpdateDTO $DTO): ?Skill
    {
        $skill = $this->Find($DTO->id);
        $skill->update([
            'name' => $DTO->name,
            'description' => $DTO->description,
        ]);
        Cache::forget('skills');
        Cache::forget("skills:{$DTO->id}");
        return $skill;
    }

    public function Destroy(int $id)
    {
        $this->Find($id)->delete();
        Cache::forget('skills');
        Cache::forget("skills:$id");
    }

    public function Find(int $id): ?Skill
    {
        $skill = Cache::remember("skills:$id", 300, function () use ($id) {
            return $this->model::findOrFail($id)->toArray();
        });

        return Skill::hydrate([$skill])->first();
    }

}
