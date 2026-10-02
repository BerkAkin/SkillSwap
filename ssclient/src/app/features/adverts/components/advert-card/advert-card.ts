import { Component, input } from '@angular/core';
import { IAdvertModel } from '../../models/IAdvertCard';
import { ClickableComponent } from '../../../general/components/clickable-component/clickable-component';

@Component({
  selector: 'app-advert-card',
  imports: [ClickableComponent],
  templateUrl: './advert-card.html',
  styleUrl: './advert-card.css',
})
export class AdvertCard {
  data = input<IAdvertModel>();

  alert = () => {
    console.log(12);
  }
}
