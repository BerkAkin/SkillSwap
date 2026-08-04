<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Chat extends Model
{
    use HasFactory,Notifiable;
    protected $fillable = [];
    protected $hidden = [];
    
    public function adverts(){
        return $this->belongsTo(Advert::class);
    }
    public function messages(){
        return $this->hasMany(Message::class);
    }
    
}
