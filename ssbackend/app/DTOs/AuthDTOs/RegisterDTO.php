<?php

namespace App\DTOs\AuthDTOs;

final readonly class RegisterDTO
{

    public function __construct(
        public string $firstname,
        public string $lastname,
        public string $phoneNumber,
        public string $email,
        public string $password,
        public string $gender,
    ){}

    public static function fromValidated(array $data): self{
        return new self(
            firstname: $data['firstname'],
            lastname: $data['lastname'],
            phoneNumber: $data['phone_number'],
            email: $data['email'],
            password :$data['password'],
            gender: $data['gender'],
        );
    }
}
