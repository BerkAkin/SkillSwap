import { Component, input } from '@angular/core';
import { DatePipe, NgClass } from '@angular/common';

@Component({
  selector: 'app-chat-bubble',
  imports: [NgClass, DatePipe],
  templateUrl: './chat-bubble.html',
  styleUrl: './chat-bubble.css',
})
export class ChatBubble {
  message = input<string>('');
  date = input<string>('');
  isMe = input<boolean>(false);
}
