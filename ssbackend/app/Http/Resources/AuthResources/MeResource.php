<?php

namespace App\Http\Resources\AuthResources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MeResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'=> $this->id,
            'firstname'=>$this->firstname,
            'lastname'=> $this->lastname,
            'email'=> $this->email,
            'gender'=> $this->gender,
            'phone_number'=> $this->phone_number,
            'role'=>$this->role,
            'is_active'=>$this->isActive,
            'skills'=>$this->skills,
        ];
    }
}
