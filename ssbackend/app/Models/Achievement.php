<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Achievement extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [];
    protected $hidden = [];

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
