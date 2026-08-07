<?php

namespace App\Services;

use App\Contracts\AchievementServiceInterface;
use App\DTOs\AchievementDTOs\StoreDTO;
use App\DTOs\AchievementDTOs\UpdateDTO;
use App\Models\Achievement;

class AchievementService extends BaseService implements AchievementServiceInterface
{
    protected string $model = Achievement::class;

    public function Create(StoreDTO $DTO): ?Achievement
    {
        $achievement = $this->model::create([
            'title'=> $DTO->title,
            'description' => $DTO->description,
        ]);
        return $achievement;
    }


    public function Update(UpdateDTO $DTO): ?Achievement
    {
        $achievement = $this->Find($DTO->id);
        $achievement->update([
            'title'=> $DTO->title,
            'description' => $DTO->description,
        ]);
        return $achievement;
    }

}
