<?php

namespace App\Contracts;

use App\DTOs\MeetingDTOs\DecideResultDTO;
use App\DTOs\MeetingDTOs\StoreDTO;
use App\DTOs\MeetingDTOs\UpdateDTO;
use App\Models\Meeting;
use Illuminate\Database\Eloquent\Collection;

interface IMeetingService 
{
    public function Create(StoreDTO $DTO): ?Meeting;
    public function Update(UpdateDTO $DTO);
    public function GetAll(): Collection;
    public function GetConflictedMeetings():Collection;
    public function DecideResult(DecideResultDTO $DTO);
}
