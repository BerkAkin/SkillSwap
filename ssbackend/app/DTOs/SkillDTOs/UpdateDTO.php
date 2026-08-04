<?php

namespace App\DTOs\SkillDTOs;

final readonly class UpdateDTO
{
    public function __construct(
        public string $name, 
        public string $description,
        public int $id,
    ){}

    public static function fromArray(array $data,int $id):self{
        return new self(
            name:$data['name'],
            description:$data['description'],
            id: $id,
        );
    }
}
