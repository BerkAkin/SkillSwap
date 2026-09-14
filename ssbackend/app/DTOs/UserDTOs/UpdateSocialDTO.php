<?php

namespace App\DTOs\UserDTOs;

final readonly class UpdateSocialDTO
{
    public function __construct(
        public string $url, 
        public int $id
    ){}
    public static function fromType(array $data, int $id):self{ 
        return new self(
            url:$data['url'],
            id:$id
        );
    }
}
