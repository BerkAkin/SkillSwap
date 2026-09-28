<?php

namespace App\Contracts;

use App\DTOs\AdvertDTOs\StoreDTO;
use App\Models\Advert;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface IAdvertService
{
    public function Create(StoreDTO $DTO): ?Advert;
    public function GetAll();
    public function Find(int $id);
    public function Destroy(int $id);
    public function myAdverts(): Collection;
}
