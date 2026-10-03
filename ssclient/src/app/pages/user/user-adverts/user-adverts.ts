import { Component } from '@angular/core';
import { AdvertCreator } from '../../../features/adverts/components/advert-creator/advert-creator';

@Component({
  selector: 'app-my-adverts',
  imports: [AdvertCreator],
  templateUrl: './user-adverts.html',
  styleUrl: './user-adverts.css',
})
export class UserAdverts { }
