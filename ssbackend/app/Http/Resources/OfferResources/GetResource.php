<?php

namespace App\Http\Resources\OfferResources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GetResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'offer_user' => [
                'id' => $this->user_id,
                'username' => $this->user->firstname
            ],
            'offer_skill' => [
                'id'=> $this->skill_id,
                'name'=> $this->skill->name,
            ],
            'status'=>$this->status,
        ];
    }
}
