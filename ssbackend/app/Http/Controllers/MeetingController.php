<?php

namespace App\Http\Controllers;

use App\Contracts\IMeetingService;
use App\DTOs\MeetingDTOs\DecideResultDTO;
use App\DTOs\MeetingDTOs\StoreDTO;
use App\DTOs\MeetingDTOs\UpdateDTO;
use App\Http\Requests\MeetingRequests\DecideResultRequest;
use App\Http\Requests\MeetingRequests\StoreRequest;
use App\Http\Requests\MeetingRequests\UpdateRequest;
use App\Http\Resources\MeetingResource\GetResource;

class MeetingController extends Controller
{
    public function __construct(private readonly IMeetingService $service) {}

    public function store(StoreRequest $request){
        $dto = StoreDTO::fromArray($request->validated());
        $result = $this->service->Create($dto);
        return response()->json([
            'message'=>'Meeting planned successfully',
            'data' => $result
        ],201);
    }

    public function index(){
        $result = $this->service->GetAll();
         return response()->json([
            'message'=>'Meetings fetched successfully',
            'data' => GetResource::collection($result)
        ],200);
    }


    public function update(UpdateRequest $request){
        $dto = UpdateDTO::fromArray($request->validated());
        $result = $this->service->Update($dto);
        return response()->json([
            'message'=>'Your decision saved successfully',
            'data' => $result
        ],201);
    }

    public function getConflicts(){
        $result = $this->service->GetConflictedMeetings();
        return response()->json([
            'message'=>'Conflicted meetings fetched successfully',
            'data' => $result
        ],200);
    }

    public function decideConflictResult(DecideResultRequest $request){
        $dto = DecideResultDTO::fromArray($request->validated());
        $result = $this->service->DecideResult($dto);
        return response()->json([
            'message'=>'Conflicted meeting decision made successfully',
            'data' => $result
        ],201);
    }
}
