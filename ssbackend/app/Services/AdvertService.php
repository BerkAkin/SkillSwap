<?php

namespace App\Services;

use App\Contracts\IAdvertService;
use App\DTOs\AdvertDTOs\StoreDTO;
use App\Models\Advert;
use App\Models\Skill;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class AdvertService extends BaseService implements IAdvertService
{
    protected string $model = Advert::class;

    public function GetAll(): Collection
    {
        return $this->model::
        select('id','user_id','skill_id','status','created_at')
        ->with(['user:id,firstname','skill:id,name,description'])
        ->get();
    }

    public function Find(int $id): ?Model
    {
        return $this->model::
        select('id','user_id','skill_id','status','created_at')
        ->with([
            'user:id,firstname','skill:id,name,description',
            'meeting:id,adverter_approval,offerer_approval,status'
        ])
        ->findOrFail($id);
    }

    public function Create(StoreDTO $DTO): ?Advert
    {
        $exists = Skill::where('id', $DTO->skillId)->exists();
        if (!$exists) {
            throw new \Exception('Skill does not exist');
        }

        $advertExists =  Advert::where('user_id',Auth::id())->where('skill_id',$DTO->skillId)->exists();
        if ($advertExists) {
            throw new \Exception('You already have an advert with this type of skill');
        }


        $advert = Advert::create([
            'user_id'=>Auth::id(),
            'skill_id'=>$DTO->skillId,
            'status'=> $DTO->status
        ]);
        return $advert;
    }

    public function Destroy(int $id)
    {
      return Advert::where('id',$id)->where('user_id',Auth::id())->delete();
    }

    public function myAdverts(): Collection
    {
        return Advert::with(['chats'])->where('user_id',Auth::id())->get();
    }

}
