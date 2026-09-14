<?php

namespace App\DTOs\ChatDTOs;

final readonly class StoreDTO
{
    public function __construct(
        public string $chatId,
        public string $message,
    ){}

    public static function fromArray(array $data, int $chatId): self{
        return new self (
            chatId: $chatId,
            message: $data['message'],
        );
    }
}
