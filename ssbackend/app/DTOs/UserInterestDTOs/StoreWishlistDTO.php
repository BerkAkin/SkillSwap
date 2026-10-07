<?php

namespace App\DTOs\UserInterestDTOs;

final readonly class StoreWishlistDTO
{
    public function __construct(public string $skill_id)
    {
    }
    public static function fromArray(int $skill_id): self
    {
        return new self(
            skill_id: $skill_id,
        );
    }
}
