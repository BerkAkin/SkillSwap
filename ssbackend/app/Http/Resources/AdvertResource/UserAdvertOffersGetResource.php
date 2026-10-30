<?php

namespace App\Http\Resources\AdvertResource;

use App\Http\Resources\OfferResources\GetResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserAdvertOffersGetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'current_page' => $this->currentPage(),
            'last_page' => $this->lastPage(),
            'data' => GetResource::collection($this->items()),
        ];
    }
}
