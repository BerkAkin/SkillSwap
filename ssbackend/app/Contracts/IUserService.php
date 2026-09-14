<?php

namespace App\Contracts;

use App\DTOs\UserDTOs\UpdateSocialDTO;
use App\Models\User;

interface IUserService
{
    public function meInfo(): User;
    public function updateSetting(int $id): Void;
    public function updateSocial(UpdateSocialDTO $DTO): Void;
}
