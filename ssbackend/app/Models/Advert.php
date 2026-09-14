<?php

namespace App\Models;

use App\Enums\StatusTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Override;

class Advert extends Model
{
    use HasFactory,Notifiable;
    protected $fillable = ['user_id','skill_id','status'];
    protected $hidden = [];

    #[Override]
    protected function casts():array
    {
       return [
        'status'=> StatusTypes::class,
       ];
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function skill(){
        return $this->belongsTo(Skill::class);
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
