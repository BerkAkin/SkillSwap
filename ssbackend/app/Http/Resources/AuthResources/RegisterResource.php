<?php

namespace App\Http\Resources\AuthResources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RegisterResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'=> $this->id,
            'firstname'=>$this->firstname,
            'lastname'=>$this->lastname,
            'email'=>$this->email,
            'phone_number'=>$this->phone_number,
            'gender'=> $this->gender,
        ];
    }
}
