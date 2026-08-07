<?php

namespace App\Services;

use App\Contracts\SettingServiceInterface;
use App\Models\Setting;
use App\DTOs\SettingDTOs\StoreDTO;
use App\DTOs\SettingDTOs\UpdateDTO;

class SettingService extends BaseService implements SettingServiceInterface
{
    protected string $model = Setting::class;

    public function Create(StoreDTO $DTO): ?Setting{
        $setting = Setting::create([
            'name'=> $DTO->name,
            'description' => $DTO->description,
        ]);
        return $setting;
    }

    public function Update(UpdateDTO $DTO): ?Setting{
        $setting = $this->Find($DTO->id);
        $setting->update([
            'name'=>  $DTO->name,
            'description' => $DTO->description,
        ]);
        return $setting;
    }
}
