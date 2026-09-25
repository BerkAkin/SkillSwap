<?php

namespace App\Contracts;

use App\DTOs\SkillDTOs\StoreDTO;
use App\DTOs\SkillDTOs\UpdateDTO;
use App\Models\Skill;

interface ISkillService
{
    public function Create(StoreDTO $DTO): Skill;
    public function Update(UpdateDTO $DTO): ?Skill;
    public function GetAll();
    public function Find(int $id);
    public function Destroy(int $id);
}
