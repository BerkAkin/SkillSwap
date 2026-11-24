<?php

namespace App\Http\Resources\ChatResources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GetResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'isMe' => $this->user_id === auth()->id(),
            'user' => $this->user->firstname . ' ' . $this->user->lastname,
            'message' => $this->message,
            'date' => $this->created_at,
        ];
    }
}
