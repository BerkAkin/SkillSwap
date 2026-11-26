<?php

namespace App\Http\Resources\ChatResources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GetResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'chat_id' => $this['chat']->id,
            'current_page' => $this['messages']->currentPage(),
            'total' => $this['messages']->total(),
            'last_page' => $this['messages']->lastPage(),
            'messages' => $this['messages']->map(function ($item) {
                return [
                    'isMe' => $item->user_id === auth()->id(),
                    'user' => $item->user->firstname . ' ' . $item->user->lastname,
                    'message' => $item->message,
                    'date' => $item->created_at,
                ];
            }),
        ];
    }
}
