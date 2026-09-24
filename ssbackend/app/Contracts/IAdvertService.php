<?php

namespace App\Contracts;

use App\Contracts\IBaseService;
use App\DTOs\AdvertDTOs\StoreDTO;
use App\Models\Advert;

interface IAdvertService extends IBaseService
{
    public function Create(StoreDTO $DTO): ?Advert;
    public function myAdverts():Collection;
}
