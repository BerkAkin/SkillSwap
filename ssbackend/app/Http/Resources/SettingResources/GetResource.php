<?php

namespace App\Http\Resources\SettingResources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GetResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'name'=> $this->name,
            'description'=> $this->description,
        ];
    }
}
