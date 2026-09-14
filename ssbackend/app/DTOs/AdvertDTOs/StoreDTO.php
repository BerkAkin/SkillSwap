<?php

namespace App\DTOs\AdvertDTOs;

use App\Enums\StatusTypes;

final readonly class StoreDTO
{

    public function __construct(
        public string $skillId,
        public StatusTypes $status,
    ) {}

    public static function fromArray(array $data):self{
        return new self(
            skillId:$data['skill_id'],
            status:StatusTypes::Open,
        );
    }
}
