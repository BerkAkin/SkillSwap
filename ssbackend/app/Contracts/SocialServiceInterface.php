<?php

namespace App\Contracts;

use App\Models\Social;
use App\DTOs\SocialDTOs\StoreDTO;
use App\DTOs\SocialDTOs\UpdateDTO;

interface SocialServiceInterface extends BaseServiceInterface
{
    public function Create(StoreDTO $DTO): Social;
    public function Update(UpdateDTO $DTO): ?Social;
}
