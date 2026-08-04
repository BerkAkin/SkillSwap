<?php

namespace App\Models;

use App\Enums\app\enums\StatusTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Override;

class Meeting extends Model
{
    use HasFactory,Notifiable;
    protected $fillable = [];
    protected $hidden = [];

    #[Override]
    protected function casts():array
    {
        return [
            'status'=> StatusTypes::class,
            'adverter_approval' => StatusTypes::class,
            'offerer_approval' => StatusTypes::class
        ];
    }

    public function adverts(){
        return $this->belongsTo(Advert::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function meetingTypes(){
        return $this->belongsTo(MeetingType::class);
    }
}
