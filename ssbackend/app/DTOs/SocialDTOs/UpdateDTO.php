<?php

namespace App\DTOs\SocialDTOs;

final readonly class UpdateDTO
{
    public function __construct(public string $type, public int $id){}
    public static function fromType(array $data, int $id):self{ 
        return new self(type:$data['type'],id:$id);
    }
}
