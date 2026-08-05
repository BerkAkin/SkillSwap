<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use App\Contracts\SkillServiceInterface;
use App\Models\Skill;
use App\DTOs\SkillDTOs\DestroyDTO;
use App\DTOs\SkillDTOs\ShowDTO;
use App\DTOs\SkillDTOs\StoreDTO;
use App\DTOs\SkillDTOs\UpdateDTO;

class SkillService implements SkillServiceInterface
{
    public function __construct(){ }

    public function GetAll() : Collection{
        return Skill::all();
    }


    public function Create(StoreDTO $DTO): Skill{
        return Skill::create([
            'name'=>$DTO->name,
            'description' => $DTO->description,
        ]);
    }


    public function Find(ShowDTO $DTO) : ?Skill{
        return Skill::findOrFail($DTO->id);
    }

    public function Update(UpdateDTO $DTO) : ?Skill{
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
