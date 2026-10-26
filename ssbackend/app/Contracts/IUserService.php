<?php

namespace App\Contracts;

use App\DTOs\UserDTOs\UpdateInfoDTO;
use App\DTOs\UserDTOs\UpdateSocialDTO;
use App\Models\User;

interface IUserService
{
    public function meInfo(): User;
    public function updateSetting(int $id): void;
    public function updateInfo(UpdateInfoDTO $DTO): string;
    public function updateSocial(UpdateSocialDTO $DTO): void;
}
