<?php

namespace App\Contracts;

use App\DTOs\AdvertDTOs\StoreDTO;
use App\Models\Advert;
use Illuminate\Pagination\LengthAwarePaginator;

interface IAdvertService
{
    public function Create(StoreDTO $DTO): ?Advert;
    public function GetAll();
    public function Find(int $id);
    public function Destroy(int $id);
    public function myAdverts(): LengthAwarePaginator;
    public function myAdvertDetails(int $id);
}
