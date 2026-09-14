<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\RoleTypes;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

#[Fillable(['firstname','lastname', 'email', 'password','gender','phone_number'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role'=> RoleTypes::class,
        ];
    }

    public function skills(){
        return $this->belongsToMany(Skill::class);
    }

    public function wishlist()
    {
        return $this->belongsToMany(
            Skill::class,
            'wishlists',
            'user_id',
            'skill_id'
        );
    }

    public function credits(){
        return $this->hasOne(Credit::class);
    }

    public function settings(){
        return $this->belongsToMany(Setting::class)
        ->using(SettingUser::class)
        ->withPivot('is_enabled')
        ->withTimestamps();
    }
    
    public function scores(){
        return $this->hasMany(Score::class);
    }

    public function achievements(){
        return $this->belongsToMany(Achievement::class);
    }

    public function adverts(){
        return $this->hasMany(Advert::class);
    }

    public function offers(){
        return $this->hasMany(Offer::class);
    }

    public function meeting(){
        return $this->belongsToMany(Meeting::class);
    }

    public function socials(){
        return $this->belongsToMany(Social::class)
        ->using(SocialUser::class)
        ->withPivot('url')
        ->withTimestamps();
    }
    

}
