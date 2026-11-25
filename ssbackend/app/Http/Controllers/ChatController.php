<?php

namespace App\Http\Controllers;

use App\Contracts\IChatService;
use App\DTOs\ChatDTOs\StoreDTO;
use App\Http\Requests\ChatRequests\StoreRequest;
use App\Http\Resources\ChatResources\GetResource;

class ChatController extends Controller
{
    public function __construct(private readonly IChatService $service)
    {
    }

    public function getMessages(int $offerId)
    {
        $result = $this->service->GetAll($offerId);
        return response()->json([
            'message' => 'messages fetched successfully',
            'response' => new GetResource($result),
        ], 200);
    }
    public function sendMessage(StoreRequest $request, int $chatId)
    {
        $dto = StoreDTO::fromArray($request->validated(), $chatId);
        $result = $this->service->Create($dto);
        return response()->json([
            'message' => 'message sent successfully',
            'data' => $result
        ], 200);
    }
}
