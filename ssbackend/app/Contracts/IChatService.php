<?php

namespace App\Contracts;

use App\DTOs\ChatDTOs\StoreDTO;
use App\Models\Message;
use Illuminate\Database\Eloquent\Collection;

interface IChatService 
{
    public function Create(StoreDTO $DTO): ?Message;
    public function GetAll(string $chatId): Collection;
}
