<?php

namespace App\Services;

use App\Contracts\IChatService;
use App\DTOs\ChatDTOs\StoreDTO;
use App\Enums\StatusTypes;
use App\Events\MessageSent;
use App\Models\Chat;
use App\Models\Message;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class ChatService implements IChatService
{
    protected string $model = Message::class;

    public function GetAll(string $offerId): Collection
    {
        $loggedInUser = Auth::id();
        $chat = Chat::where('offer_id', $offerId)
            ->where(function ($query) use ($loggedInUser) {
                $query->where('adverter_user_id', $loggedInUser)
                    ->orWhere('offerer_user_id', $loggedInUser);
            })
            ->first();

        if (!$chat) {
            throw new \Exception('Conversation not exists');
        }
        return $this->model::
            where('chat_id', $chat->id)
            ->select('user_id', 'message', 'created_at')
            ->with(['user:id,firstname,lastname'])
            ->orderBy('created_at', 'asc')
            ->get();
    }

    public function Create(StoreDTO $DTO): ?Message
    {
        $loggedInUser = Auth::id();
        $chat = Chat::where('id', $DTO->chatId)
            ->where(function ($query) use ($loggedInUser) {
                $query->where('adverter_user_id', $loggedInUser)
                    ->orWhere('offerer_user_id', $loggedInUser);
            })
            ->first();

        if (!$chat) {
            throw new \Exception('Conversation not exists');
        }

        if ($chat->status == StatusTypes::Close) {
            throw new \Exception('Conversation closed');
        }

        $message = Message::create([
            'user_id' => $loggedInUser,
            'chat_id' => $DTO->chatId,
            'message' => $DTO->message,
        ]);
        broadcast(new MessageSent($message))->toOthers();
        return $message;
    }

}
