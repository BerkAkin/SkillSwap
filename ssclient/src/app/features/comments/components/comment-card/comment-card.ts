import { Component, input } from '@angular/core';
import { ICommentCardModel } from '../../../infos/models/ICommentCardModel';

@Component({
  selector: 'app-comment-card',
  imports: [],
  templateUrl: './comment-card.html',
  styleUrl: './comment-card.css',
})
export class CommentCard {
  data = input.required<ICommentCardModel>();
}
