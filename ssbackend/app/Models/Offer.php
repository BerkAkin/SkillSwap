<?php

namespace App\Models;

use App\Enums\StatusTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Override;

class Offer extends Model
{
    use HasFactory,Notifiable;
    protected $fillable = ['user_id','skill_id','meeting_type_id','advert_id','status'];
    protected $hidden = [];

    protected function casts():array
    {
        return [
            'status' => StatusTypes::class,
        ];
    }

    public function advert(){
        return $this->belongsTo(Advert::class);
    }
    public function user(){
        return $this->belongsTo(User::class,);
    }
    public function skill(){
        return $this->belongsTo(Skill::class);
    }
    public function meetingType(){
        return $this->belongsTo(MeetingType::class);
    }
}
