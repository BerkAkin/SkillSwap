<?php

namespace App\Services;

use App\Contracts\IMeetingService;
use App\DTOs\MeetingDTOs\DecideResultDTO;
use App\DTOs\MeetingDTOs\StoreDTO;
use App\DTOs\MeetingDTOs\UpdateDTO;
use App\Enums\StatusTypes;
use App\Models\Advert;
use App\Models\Meeting;
use App\Models\Offer;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class MeetingService implements IMeetingService
{
    protected string $model = Meeting::class;

    public function GetAll(): Collection{
        $loggedInUser = Auth::id();
        return Meeting::where(function($query) use ($loggedInUser){
            $query->where('offerer_id',$loggedInUser)
            ->orWhere('adverter_id',$loggedInUser);
        })->get();
    }
    
    public function Create(StoreDTO $DTO): ?Meeting{
        $loggedInUser = Auth::id();
        $advert = Advert::findOrFail($DTO->advertId);
        $offer = Offer::findOrFail($DTO->offerId);

        $adverterId = $advert->user_id;
        $offererId = $offer->user_id;

        if ($advert->meetings()->exists()) {
            return null;
        }

        if ((int) $adverterId !== (int) $loggedInUser &&(int) $offererId !== (int) $loggedInUser) {
            throw new \Exception("You are not the owner of this advert or offer");
        }

        return $this->model::create([
            'advert_id'=>$DTO->advertId,
            'offer_id'=>$DTO->offerId,

            'adverter_id'=> $adverterId,
            'offerer_id'=> $offererId,

            'meeting_type_id'=>$DTO->meetingTypeId,
            'status' => $DTO->type,
            'date'=>$DTO->date,
        ]);
    }

    public function Update(UpdateDTO $DTO){
        $loggedInUser = Auth::id();

        $meeting = $this->model::findOrFail($DTO->meetingId);

        if ((int) $meeting->offerer_id === (int) $loggedInUser) {
            $meeting->update([
                'offerer_approval' =>  $DTO->choice,
            ]);
        } elseif ((int) $meeting->adverter_id === (int) $loggedInUser) {
            $meeting->update([
                'adverter_approval' => $DTO->choice,
            ]);
        } else {
            throw new \Exception('You are not a participant of this meeting.');
        }

        $this->CheckMeetingStatus($meeting);
    }

    public function GetConflictedMeetings(): Collection{
        return Meeting::with(['adverter','offerer','offer','advert','meetingType'])->where('status',StatusTypes::Conflicted)->get();
    }

    public function DecideResult(DecideResultDTO $DTO){

        $meeting = Meeting::with(['adverter.credits','offerer.credits',])->findOrFail($DTO->meetingId);

        if ($meeting->status === StatusTypes::Completed) {
            throw new \Exception('Meeting result has already been decided.');
        }

        $user = match ($DTO->userId) {
            $meeting->adverter->id => $meeting->adverter,
            $meeting->offerer->id => $meeting->offerer,
            default => throw new \Exception('This user is not part of this meeting.'),
        };

        if ($DTO->operation) {
            $user->credits->increment('credit_points');
        } 
        else {
            if ($user->credits->credit_points <= 0) {
                throw new \Exception('User does not have enough credits.');
            }

            $user->credits->decrement('credit_points');
        }
    }

    private function CheckMeetingStatus(Meeting $meeting){

        if ($meeting->status === StatusTypes::Completed) {
            return;
        }

        if (($meeting->offerer_approval===StatusTypes::Accepted && $meeting->adverter_approval===StatusTypes::Rejected)||
                ($meeting->offerer_approval===StatusTypes::Rejected && $meeting->adverter_approval===StatusTypes::Accepted)) 
        {
            $meeting->status = StatusTypes::Conflicted;
            $meeting->save();
            //BİLDİRİM AT
        }
        elseif ($meeting->offerer_approval===StatusTypes::Accepted && $meeting->adverter_approval===StatusTypes::Accepted) {
            $adverterCredits = $meeting->adverter->credits;
            $offererCredits = $meeting->offerer->credits;

            $adverterCredits->decrement('credit_points');
            $offererCredits->increment('credit_points');

            $meeting->status =  StatusTypes::Completed;
            $meeting->save();

            return;
        }
        else{
           return;
        }
    }

}
