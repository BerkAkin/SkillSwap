<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Setting extends Model
{
    use HasFactory,Notifiable;   
    protected $hidden = [];
    protected $fillable = [];

    public function users(){
        return $this->belongsToMany(User::class)
        ->using(SettingUser::class)
        ->withPivot('is_enabled')
        ->withTimestamps();
    }
}
