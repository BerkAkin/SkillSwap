<?php

namespace App\Console\Commands;

use App\Enums\StatusTypes;
use App\Models\Meeting;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('meetings:process-expired')]
#[Description('Command description')]
class ProcessExpiredMeetings extends Command
{
    public function handle()
    {
        $meetings = Meeting::where('date', '<=', now())
        ->where('status',StatusTypes::Pending)
        ->get();

        foreach($meetings as $meeting){
            if ($meeting->offerer_approval === StatusTypes::Pending) {
                \Log::info( $meeting->date . ' tarihli swap için onayın bekleniyor '. $meeting->adverts()->skill()->name);
            }

            if ($meeting->adverter_approval === StatusTypes::Pending) {
                \Log::info( $meeting->date . 'tarihli swap için onayın bekleniyor'. ' '. $meeting->adverts()->skill()->name);
            }
        }
    }
}
