<?php

namespace App\Contracts;

use App\DTOs\SettingDTOs\StoreDTO;
use App\DTOs\SettingDTOs\UpdateDTO;
use App\Models\Setting;

interface SettingServiceInterface extends BaseServiceInterface
{
    public function Create(StoreDTO $DTO): ?Setting;
    public function Update(UpdateDTO $DTO): ?Setting;
}
