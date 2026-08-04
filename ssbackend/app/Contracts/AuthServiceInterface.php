<?php

namespace App\Contracts;

use App\DTOs\AuthDTOs\LoginDTO;
use App\DTOs\AuthDTOs\RegisterDTO;
use App\Models\User;

interface AuthServiceInterface
{
    public function Login(LoginDTO $DTO):array;
    public function Register(RegisterDTO $DTO):array;
    public function Logout(User $user):void;
}
