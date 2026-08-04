<?php

namespace App\Contracts;

use App\DTOs\SkillDTOs\DestroyDTO;
use App\DTOs\SkillDTOs\ShowDTO;
use App\DTOs\SkillDTOs\StoreDTO;
use App\DTOs\SkillDTOs\UpdateDTO;

interface SkillServiceInterface
{
    public function GetAll();
    public function Create(StoreDTO $DTO);
    public function Find(ShowDTO $DTO);
    public function Update(UpdateDTO $DTO);
    public function Destroy(DestroyDTO $DTO);
}
