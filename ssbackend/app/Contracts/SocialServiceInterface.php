<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Social;
use App\DTOs\SocialDTOs\DestroyDTO;
use App\DTOs\SocialDTOs\ShowDTO;
use App\DTOs\SocialDTOs\StoreDTO;
use App\DTOs\SocialDTOs\UpdateDTO;

interface SocialServiceInterface
{
    public function GetAll(): Collection;
    public function Find(ShowDTO $DTO): ?Social;
    public function Create(StoreDTO $DTO): Social;
    public function Update(UpdateDTO $DTO): ?Social;
    public function Destroy(DestroyDTO $DTO); 
}
