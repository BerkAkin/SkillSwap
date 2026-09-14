<?php

namespace App\Http\Resources\UserResources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GetResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
          'firstname'=> $this->firstname,
          'lastname'=> $this->lastname,
          'phone_number'=> $this->phone_number,
          'email'=> $this->email,
          'gender'=> $this->gender == 'm' ? 'Male' : 'Female',
          'isActive' => $this->isActive == 't' ? 'Active': 'Passive',  
          'role'=> $this->role,
          'register_date'=> $this->created_at,
          'credits'=>[
            'points'=>$this->credits->credit_points,
          ],
          'skills'=> $this->skills->map(fn($skill)=>[
            'id' => $skill->id,
            'name' => $skill->name,
            'description' => $skill->description,
          ]),
          'wishlist'=> $this->wishlist->map(fn($wish)=>[
            'id' => $wish->id,
            'name' => $wish->name,
            'description' => $wish->description,
          ]),
          'socials' => $this->socials->map(fn($social)=>[
            'id' => $social->id,
            'type' => $social->type,
            'url' => $social->pivot->url,
          ]),
          'achievements'=> $this->achievements->map(fn($achievement)=>[
            'id'=> $achievement->id,
            'title' => $achievement->title,
            'description' => $achievement->description,
          ]),
          'settings'=> $this->settings->map(fn($setting)=>[
            'id'=> $setting->id,
            'name' => $setting->name,
            'description' => $setting->description,
            'is_enabled' => $setting->pivot->is_enabled,
          ]),
        ];
    }
}
