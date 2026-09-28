import { Component, input } from '@angular/core';
import { IAdvertModel } from '../../models/IAdvertCard';

@Component({
  selector: 'app-advert-card',
  imports: [],
  templateUrl: './advert-card.html',
  styleUrl: './advert-card.css',
})
export class AdvertCard {
  data = input<IAdvertModel>();

}
