<?php

namespace App\Models;

use App\Enums\StatusTypes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Chat extends Model
{
    use Notifiable;
    protected $fillable = ['offer_id','advert_id','adverter_user_id','offerer_user_id','status'];
    protected $hidden = [];
    protected $casts = [
    'status' => StatusTypes::class,
    ];
    
    public function adverts(){
        return $this->belongsTo(Advert::class);
    }
    public function messages(){
        return $this->hasMany(Message::class);
    }
    
}
