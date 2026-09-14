<?php

use App\Enums\StatusTypes;
use App\Models\Chat;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('chat.{chatId}',function($user, $chatId){
    $chat = Chat::find($chatId);

    if(!$chat)
        return false;

    if ($chat->status !== StatusTypes::Accepted)
        return false;
    
     return (int) $chat->adverter_user_id === (int) $user->id
        || (int) $chat->offerer_user_id === (int) $user->id;

});