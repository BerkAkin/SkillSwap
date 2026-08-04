<?php

namespace App\Models;

use App\SocialType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Override;

class Social extends Model
{
    use HasFactory,Notifiable; 
    protected $fillable = [];
    protected $hidden = [];

    #[Override]
    protected function casts()
    {
        return [
            'type'=> SocialType::class,
        ];
    }

    public function users(){
        return $this->belongsToMany(User::class)
        ->using(SocialUser::class)
        ->withPivot('url')
        ->withTimestamps();
    }
}
