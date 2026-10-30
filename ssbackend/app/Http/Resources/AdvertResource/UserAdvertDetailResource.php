<?php

namespace App\Http\Resources\AdvertResource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserAdvertDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'skill' => [
                'id' => $this->skill->id,
                'name' => $this->skill->name,
                'description' => $this->skill->description,
                'created_at' => $this->skill->created_at
            ],
        ];
    }
}
