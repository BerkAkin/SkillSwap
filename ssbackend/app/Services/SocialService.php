<?php

namespace App\Services;

use App\Contracts\SocialServiceInterface;
use App\Models\Social;
use App\DTOs\SocialDTOs\StoreDTO;
use App\DTOs\SocialDTOs\UpdateDTO;

class SocialService extends BaseService implements SocialServiceInterface
{

    public function Create(StoreDTO $DTO): Social{
        $exists = Social::where('type', $DTO->type)->exists();
        if ($exists) {
            throw new \Exception('Social is already registered');
        }

        $social = Social::create(['type'=> $DTO->type]);
        return $social;
    }

    public function Update(UpdateDTO $DTO): ?Social{
        $social = $this->Find($DTO->id);
        $social->update([
            'type'=>$DTO->type
        ]);
        return $social;
    }

}
