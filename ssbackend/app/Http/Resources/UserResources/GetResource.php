<?php

namespace App\Http\Resources\UserResources;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GetResource extends JsonResource
{

  public function toArray(Request $request): array
  {
    return [
      'firstname' => $this->firstname,
      'lastname' => $this->lastname,
      'phone_number' => $this->phone_number,
      'email' => $this->email,
      'gender' => $this->gender == 'm' ? 'Male' : 'Female',
      'isActive' => $this->isActive == 't' ? 'Active' : 'Passive',
      'role' => $this->role,
      'register_date' => $this->created_at->format('d.m.Y'),
      'credits' => [
        'points' => $this->credits->credit_points,
      ],
      'skills' => $this->skills->map(fn($skill) => [
        'id' => $skill->id,
        'name' => $skill->name,
      ]),
      'wishlist' => $this->wishlist->map(fn($wish) => [
        'id' => $wish->id,
        'name' => $wish->name,
        'description' => $wish->description,
      ]),
      'socials' => $this->socials->map(fn($social) => [
        'id' => $social->id,
        'type' => $social->type,
        'url' => $social->pivot->url,
      ]),
      'achievements' => $this->achievements->map(
        fn($achievement) =>
          $achievement->id,
      ),
      'settings' => $this->settings->map(
        fn($setting) => $setting->id,
      ),
    ];
  }
}
