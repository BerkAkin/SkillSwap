<?php

namespace App\Services;

use App\Contracts\IOfferService;
use App\DTOs\OfferDTOs\StoreDTO;
use App\Enums\StatusTypes;
use App\Models\Advert;
use App\Models\Chat;
use App\Models\Offer;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OfferService implements IOfferService
{
    public function __construct(){}

    public function getAllOffers(int $id): Collection{
        $advert = Advert::where('id',$id)->where('user_id',Auth::id())->firstOrFail();
        return $advert->offers()->get();  
    }


    public function showOffer(int $id): Offer{
        $loggedInUser = Auth::id();
        return Offer::whereHas('advert',function($query) use($loggedInUser){
            $query->where('user_id',$loggedInUser);
        })->with('advert')->findOrFail($id);
    }

    public function makeOffer(StoreDTO $DTO): Offer{
        $offer = Offer::create([
            'user_id'=> Auth::id(),
            'status'=> StatusTypes::Pending,
            'advert_id'=>$DTO->advertId,
            'skill_id'=>$DTO->skillId,
            'meeting_type_id'=> $DTO->meetingTypeId,
        ]);
        return $offer;
    }


    public function cancelOffer(int $id): Offer{
        
        $offer = Offer::where('user_id',Auth::id())->findOrFail($id);
        $offer->delete();
        return $offer;
    }


    public function decideOffer(int $id, StatusTypes $type): Offer{
        $loggedInUser = Auth::id();
        $offer = Offer::whereHas('advert',function($query) use($loggedInUser){
            $query->where('user_id',$loggedInUser);
        })->findOrFail($id);
        
        if($offer->status==StatusTypes::Pending){
            DB::transaction(function() use($offer,$type,$loggedInUser){
                $offer->update([
                    'status'=> $type,
                ]);   

                $chat = Chat::create([
                    'offer_id'=> $offer->id,
                    'advert_id'=> $offer->advert_id,
                    'adverter_user_id' => $loggedInUser,
                    'offerer_user_id'=>$offer->user_id,
                    'status'=> StatusTypes::Accepted,
                ]);

            });
        }
        else{
            throw new \Exception('Offer status is not pending and decided');
        }
        return $offer;
    }

    public function myOffers(): Collection{
        $offers = Offer::where('user_id',Auth::id())->with('advert')->get();
        return $offers;
    }
}
