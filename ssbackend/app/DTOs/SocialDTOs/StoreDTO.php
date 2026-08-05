<?php

namespace App\DTOs\SocialDTOs;

final readonly class StoreDTO
{
    public function __construct(public string $type){}
    public static function fromType(array $data):self{
        return new self(type:$data['type']);
    }
}
