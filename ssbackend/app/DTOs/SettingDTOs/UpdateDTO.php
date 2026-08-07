<?php

namespace App\DTOs\SettingDTOs;

class UpdateDTO
{
    public function __construct(
        public int $id,
        public string $name,
        public string $description
    ){}

    public static function fromArray(int $id, array $data): self{
        return new self (
            id: $id,
            name: $data['name'],
            description: $data['description']
        );
    }
}
