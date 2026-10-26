<?php

namespace App\DTOs\UserDTOs;

final readonly class UpdateInfoDTO
{

    public function __construct(public string $value, public string $type)
    {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            type: $data['type'],
            value: $data['value'],
        );
    }
}
