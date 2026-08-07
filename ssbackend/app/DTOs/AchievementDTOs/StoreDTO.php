<?php

namespace App\DTOs\AchievementDTOs;

final readonly class StoreDTO
{
    public function __construct(
        public string $title,
        public string $description
    ){}

    public static function fromArray(array $data):self{
        return new self(
            title:$data['title'],
            description:$data['description'],
        );
    }
}
