<?php

namespace App\Contracts;

use App\DTOs\AchievementDTOs\StoreDTO;
use App\DTOs\AchievementDTOs\UpdateDTO;
use App\Models\Achievement;

interface IAchievementService extends IBaseService
{
    public function Create(StoreDTO $DTO): ?Achievement;
    public function Update(UpdateDTO $DTO): ?Achievement;
}
