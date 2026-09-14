<?php

namespace App\Http\Resources\AdvertResource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=> $this->id,
            'status'=>$this->status,
            'created_at'=> $this->created_at,
            'user'=>[
                'id'=>$this->user_id,
                'name'=>$this->user?->firstname,
            ],
            'skill'=>[
                'id'=>$this->skill_id,
                'name'=>$this->skill?->name,
                'description'=>$this->skill?->description,
            ],
        ];
    }
}
