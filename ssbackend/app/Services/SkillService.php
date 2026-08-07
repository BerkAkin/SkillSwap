<?php

namespace App\Services;

use App\Contracts\SkillServiceInterface;
use App\Models\Skill;
use App\DTOs\SkillDTOs\StoreDTO;
use App\DTOs\SkillDTOs\UpdateDTO;

class SkillService extends BaseService implements SkillServiceInterface 
{
    protected string $model = Skill::class;

    public function Create(StoreDTO $DTO): Skill{
        $skill = Skill::create([
            'name'=>$DTO->name,
            'description' => $DTO->description,
        ]);
        return $skill;
    }
    public function Update(UpdateDTO $DTO) : ?Skill{
        $skill = $this->Find($DTO->id);
        $skill->update([
            'name'=>  $DTO->name,
            'description' => $DTO->description,
        ]);
        return $skill;
    }

}
