<?php

namespace App\Contracts;

use App\DTOs\ChatDTOs\StoreDTO;
use App\Models\Message;
use Illuminate\Pagination\LengthAwarePaginator;

interface IChatService
{
    public function Create(StoreDTO $DTO): ?Message;
    public function GetAll(string $chatId): array;
}
