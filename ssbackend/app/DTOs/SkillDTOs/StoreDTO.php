<?php

namespace App\DTOs\SkillDTOs;

final readonly class StoreDTO
{

    public function __construct(
        public string $name,
        public string $description,
    ){}

    public static function fromValidation(array $data):self{
        return new self(
            name: $data['name'],
            description: $data['description']
        );
    }
}
