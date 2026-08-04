<?php

namespace App\Contracts;

use App\DTOs\SkillDTOs\ShowDTO;
use App\DTOs\SkillDTOs\StoreDTO;

interface SkillServiceInterface
{
    public function GetAll();
    public function Create(StoreDTO $DTO);
    public function Find(ShowDTO $DTO);
    public function Update();
    public function Delete();
}
