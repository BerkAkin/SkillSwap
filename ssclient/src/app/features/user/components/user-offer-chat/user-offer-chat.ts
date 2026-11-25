import { Component, ElementRef, ViewChild } from '@angular/core';
import { UserChatService } from '../../services/user-chat-service';
import { ChatBubble } from '../../../general/components/chat-bubble/chat-bubble';

@Component({
  selector: 'app-user-offer-chat',
  imports: [ChatBubble],
  templateUrl: './user-offer-chat.html',
  styleUrl: './user-offer-chat.css',
})
export class UserOfferChat {

  messageContainerElement: ElementRef<HTMLDivElement> | undefined;

  elementHeight: number = 0;


  @ViewChild('messageContainer')
  set messageContainer(element: ElementRef<HTMLDivElement> | undefined) {
    if (element) {
      this.messageContainerElement = element;

      requestAnimationFrame(() => {
        element.nativeElement.scrollTop = element.nativeElement.scrollHeight - this.elementHeight;
        this.elementHeight = element.nativeElement.scrollHeight;

      });
    }
  }



  constructor(public userChatService: UserChatService) { }

  onScroll() {
    if (!this.messageContainerElement) return;

    if (this.messageContainerElement.nativeElement.scrollTop === 0 && this.userChatService.current_page() < this.userChatService.last_page()) {
      const nextPage = this.userChatService.current_page() + 1;
      this.userChatService.current_page.set(nextPage);
      this.userChatService.getMessages(this.userChatService.offerId()!, nextPage);
    }
  }
}
