<?php

namespace App\Contracts;

use App\DTOs\SkillDTOs\DestroyDTO;
use App\DTOs\SkillDTOs\ShowDTO;
use App\DTOs\SkillDTOs\StoreDTO;
use App\DTOs\SkillDTOs\UpdateDTO;
use App\Models\Skill;
use Illuminate\Database\Eloquent\Collection;

interface SkillServiceInterface
{
    public function GetAll(): Collection;
    public function Create(StoreDTO $DTO): Skill;
    public function Find(ShowDTO $DTO) : ?Skill;
    public function Update(UpdateDTO $DTO): ?Skill;
    public function Destroy(DestroyDTO $DTO);
}
