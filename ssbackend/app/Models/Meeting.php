<?php

namespace App\Models;

use App\Enums\StatusTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Override;

class Meeting extends Model
{
    use HasFactory,Notifiable;
    protected $fillable = [
        'advert_id',
        'offer_id',
        'adverter_id',
        'offerer_id',
        'adverter_approval',
        'offerer_approval',
        'meeting_type_id',
        'status',
        'date',
    ];
    protected $hidden = [];

    protected function casts():array
    {
        return [
            'status'=> StatusTypes::class,
            'adverter_approval' => StatusTypes::class,
            'offerer_approval' => StatusTypes::class
        ];
    }

    public function advert(){
        return $this->belongsTo(Advert::class);
    }

    public function offer(){
        return $this->belongsTo(Offer::class);
    }

    public function adverter(){
        return $this->belongsTo(User::class,'adverter_id');
    }

    public function offerer(){
        return $this->belongsTo(User::class,'offerer_id');
    }

    public function meetingType(){
        return $this->belongsTo(MeetingType::class);
    }
}
