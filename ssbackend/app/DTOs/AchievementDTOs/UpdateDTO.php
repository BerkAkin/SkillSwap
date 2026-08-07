<?php

namespace App\DTOs\AchievementDTOs;

final readonly class UpdateDTO
{
    public function __construct(
        public int $id,
        public string $title,
        public string $description
    ){}

    public static function fromArray(int $id, array $data):self{
        return new self(
            id:$id,
            title:$data['title'],
            description:$data['description'],
        );
    }
}
