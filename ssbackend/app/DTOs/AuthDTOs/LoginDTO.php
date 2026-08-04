<?php

namespace App\DTOs\AuthDTOs;

final readonly class LoginDTO
{
    public function __construct(
        public string $email,
        public string $password
    ){}

    public static function fromArray(array $array):self{
            return new self(
            email: $array['email'],
            password: $array['password']
        );
    }

}
