<?php

namespace App\Services;

use App\Contracts\SkillServiceInterface;
use App\DTOs\SkillDTOs\DestroyDTO;
use App\DTOs\SkillDTOs\ShowDTO;
use App\DTOs\SkillDTOs\StoreDTO;
use App\DTOs\SkillDTOs\UpdateDTO;
use App\Models\Skill;

class SkillService implements SkillServiceInterface
{
    public function __construct(){ }

    public function GetAll(){
        return Skill::all();
    }


    public function Create(StoreDTO $DTO){
        return Skill::create([
            'name'=>$DTO->name,
            'description' => $DTO->description,
        ]);
    }


    public function Find(ShowDTO $DTO){
        return Skill::findOrFail($DTO->id);
    }

    public function Update(UpdateDTO $DTO):Skill{
        $skill = Skill::findOrFail($DTO->id);
        $skill->update([
            'name'=>  $DTO->name,
            'description' => $DTO->description,
        ]);
        return $skill;
    }



    public function Destroy(DestroyDTO $DTO){
        Skill::findOrFail($DTO->id)->delete();
    }

}
