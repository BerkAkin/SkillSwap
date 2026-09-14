<?php

namespace App\Services;

use App\Contracts\ISocialService;
use App\Models\Social;
use App\DTOs\SocialDTOs\StoreDTO;
use App\DTOs\SocialDTOs\UpdateDTO;

class SocialService extends BaseService implements ISocialService
{
    protected string $model = Social::class;

    public function Create(StoreDTO $DTO): Social{
        $exists = $this->model::where('type', $DTO->type)->exists();
        if ($exists) {
            throw new \Exception('Social is already registered');
        }

        $social = $this->model::create(['type'=> $DTO->type]);
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
