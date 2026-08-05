<?php

namespace App\Models;

use App\Enums\SocialTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Social extends Model
{
    use HasFactory; 
    protected $fillable = ['type'];
    protected $hidden = [];

    protected function casts()
    {
        return [
            'type'=> SocialTypes::class,
        ];
    }

    public function users(){
        return $this->belongsToMany(User::class)
        ->using(SocialUser::class)
        ->withPivot('url')
        ->withTimestamps();
    }
}
