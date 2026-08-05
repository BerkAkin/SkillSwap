<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use App\Contracts\SocialServiceInterface;
use App\Models\Social;
use App\DTOs\SocialDTOs\DestroyDTO;
use App\DTOs\SocialDTOs\ShowDTO;
use App\DTOs\SocialDTOs\StoreDTO;
use App\DTOs\SocialDTOs\UpdateDTO;

class SocialService implements SocialServiceInterface
{
    public function __construct(){}

    public function GetAll(): Collection{
        return Social::all();
    }


    public function Find(ShowDTO $DTO): ?Social{
        return Social::findOrFail($DTO->id);
    }


    public function Create(StoreDTO $DTO): Social{
        $exists = Social::where('type', $DTO->type)->exists();

        if ($exists) {
            throw new \Exception('Social is already registered');
        }

        $social = Social::create(['type'=> $DTO->type]);
        return $social;
    }

    public function Update(UpdateDTO $DTO): ?Social{
        $social = Social::findOrFail($DTO->id);
        $social->update(['type'=>$DTO->type]);
        return $social;
    }

    public function Destroy(DestroyDTO $DTO){
         Social::findOrFail($DTO->id)->delete();
    }

}
