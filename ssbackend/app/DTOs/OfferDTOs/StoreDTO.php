<?php

namespace App\DTOs\OfferDTOs;

use App\Enums\StatusTypes;

final readonly class StoreDTO
{
    public function __construct(
        public string $skillId,
        public string $advertId,
        public string $meetingTypeId,
    ) {}

    public static function fromRoute(int $advertId,array $data):self{
        return new self(
            skillId: $data['skill_id'],
            meetingTypeId: $data['meeting_type_id'],
            advertId: $advertId,
        );
    }
}
