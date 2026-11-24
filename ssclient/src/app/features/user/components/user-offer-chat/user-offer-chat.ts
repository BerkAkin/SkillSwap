import { Component } from '@angular/core';
import { UserChatService } from '../../services/user-chat-service';
import { ChatBubble } from '../../../general/components/chat-bubble/chat-bubble';

@Component({
  selector: 'app-user-offer-chat',
  imports: [ChatBubble],
  templateUrl: './user-offer-chat.html',
  styleUrl: './user-offer-chat.css',
})
export class UserOfferChat {
  constructor(public userChatService: UserChatService) { }
}
