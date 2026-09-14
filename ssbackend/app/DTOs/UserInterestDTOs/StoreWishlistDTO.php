<?php

namespace App\DTOs\UserInterestDTOs;

final readonly class StoreWishlistDTO
{
    public function __construct(public string $user_id,public string $skill_id){}
    public static function fromArray (int $user_id, int $skill_id):self{
        return new self(
            user_id: $user_id,
            skill_id: $skill_id,
        );
    }
}
