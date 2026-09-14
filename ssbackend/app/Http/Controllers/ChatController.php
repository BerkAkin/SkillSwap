<?php

namespace App\Http\Controllers;

use App\Contracts\IChatService;
use App\DTOs\ChatDTOs\StoreDTO;
use App\Http\Requests\ChatRequests\StoreRequest;
use App\Http\Resources\ChatResources\GetResource;

class ChatController extends Controller
{
    public function __construct(private readonly IChatService $service){}

    public function getMessages(int $chatId){
        $result = $this->service->GetAll($chatId);
        return response()->json([
            'message'=> 'messages fetched successfully',    
            'data'=> GetResource::collection($result),
        ],200);
    }
    public function sendMessage(StoreRequest $request, int $id){
        $dto = StoreDTO::fromArray($request->validated(),$id);
        $result = $this->service->Create($dto);
        return response()->json([
            'message'=> 'message sent successfully',    
            'data'=> $result
        ],200);
    }
}
