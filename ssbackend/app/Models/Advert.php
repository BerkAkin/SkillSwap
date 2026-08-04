<?php

namespace App\Models;

use App\Enums\app\enums\StatusTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Override;

class Advert extends Model
{
    use HasFactory,Notifiable;
    protected $fillable = [];
    protected $hidden = [];

    #[Override]
    protected function casts():array
    {
       return [
        'status'=> StatusTypes::class,
       ];
    }

    public function users(){
        return $this->belongsTo(User::class);
    }
    public function chats(){
        return $this->hasMany(Chat::class);
    }
    public function offers(){
        return $this->hasMany(Offer::class);
    }

    public function meeting(){
        return $this->hasOne(Meeting::class);
    }
}
