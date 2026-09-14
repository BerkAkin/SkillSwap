import { Component, input } from '@angular/core';
import { IAdvertCard } from '../../models/IAdvertCard';

@Component({
  selector: 'app-advert-card',
  imports: [],
  templateUrl: './advert-card.html',
  styleUrl: './advert-card.css',
})
export class AdvertCard {
  data = input<IAdvertCard>();
  maxStars = 500;

  getStars = (): number => {
    if (this.data()!.points > 500) {
      return 5;
    }
    return (this.data()!.points * 5) / this.maxStars;
  };
}
