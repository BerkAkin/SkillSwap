<?php

namespace App\DTOs\SocialDTOs;

final readonly class DestroyDTO
{
    public function __construct(public int $id){}
    public static function fromRoute(int $id):self{
        return new self($id);
    }
}
