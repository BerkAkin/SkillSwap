<?php

namespace App\Contracts;

use App\DTOs\OfferDTOs\StoreDTO;
use App\Enums\StatusTypes;
use App\Models\Offer;
use Illuminate\Support\Collection;

interface IOfferService
{
    public function getAllOffers(int $id): Collection;
    public function showOffer(int $id): Offer;
    public function makeOffer(StoreDTO $DTO): Offer;
    public function cancelOffer(int $id): Offer;
    public function myOffers(): Collection;
    public function decideOffer(int $id,StatusTypes $type):Offer;
}
