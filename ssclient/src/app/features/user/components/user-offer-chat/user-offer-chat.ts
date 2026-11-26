import { Component, ElementRef, ViewChild } from '@angular/core';
import { UserChatService } from '../../services/user-chat-service';
import { ChatBubble } from '../../../general/components/chat-bubble/chat-bubble';
import { FormsModule } from '@angular/forms';
import { ClickableComponent } from '../../../general/components/clickable-component/clickable-component';
import { IChatMessageModel } from '../../models/IChatMessageModel';

@Component({
  selector: 'app-user-offer-chat',
  imports: [ChatBubble, FormsModule, ClickableComponent],
  templateUrl: './user-offer-chat.html',
  styleUrl: './user-offer-chat.css',
})
export class UserOfferChat {

  constructor(public userChatService: UserChatService) { }

  messageContainerElement: ElementRef<HTMLDivElement> | undefined;
  userMessage: string = '';
  elementHeight: number = 0;
  private isSendingMessage = false;

  @ViewChild('messageContainer')
  set messageContainer(element: ElementRef<HTMLDivElement> | undefined) {
    if (element) {
      this.messageContainerElement = element;

      if (this.isSendingMessage) {
        this.isSendingMessage = false;
        return;
      }
      requestAnimationFrame(() => {
        element.nativeElement.scrollTop = element.nativeElement.scrollHeight - this.elementHeight;
        this.elementHeight = element.nativeElement.scrollHeight;

      });
    }
  }

  onScroll() {
    if (!this.messageContainerElement) return;

    if (this.messageContainerElement.nativeElement.scrollTop === 0 && this.userChatService.current_page() < this.userChatService.last_page()) {
      const nextPage = this.userChatService.current_page() + 1;
      this.userChatService.current_page.set(nextPage);
      this.userChatService.getMessages(this.userChatService.offerId()!, nextPage);
    }
  }

  onSendMessage() {
    if (this.userMessage.trim() === "") return;

    const newMessage: IChatMessageModel = {
      user: "",
      isMe: true,
      message: this.userMessage,
      date: new Date().toString(),
    }

    try {
      this.userChatService.sendMessage(newMessage.message);
    }
    catch (error) {
      console.log("Error while sending message: ", error);
      return;
    }

    this.isSendingMessage = true;
    this.userChatService.addNewMessageToChatWindow(newMessage);

    requestAnimationFrame(() => {
      this.messageContainerElement?.nativeElement.scrollTo({ top: this.messageContainerElement?.nativeElement.scrollHeight })
    })

    this.userMessage = "";
  }
}
