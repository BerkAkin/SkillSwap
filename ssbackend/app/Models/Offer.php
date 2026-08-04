<?php

namespace App\Models;

use App\Enums\app\enums\StatusTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Override;

class Offer extends Model
{
    use HasFactory,Notifiable;
    protected $hidden = [];
    protected $fillable = [];

    #[Override]
    protected function casts():array
    {
        return [
            'status' => StatusTypes::class,
        ];
    }

    public function adverts(){
        return $this->belongsTo(Advert::class);
    }

    public function users(){
        return $this->belongsTo(User::class);
    }
}
