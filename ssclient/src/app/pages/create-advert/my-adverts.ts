import { Component } from '@angular/core';
import { AdvertCreator } from '../../features/adverts/components/advert-creator/advert-creator';

@Component({
  selector: 'app-my-adverts',
  imports: [AdvertCreator],
  templateUrl: './my-adverts.html',
  styleUrl: './my-adverts.css',
})
export class MyAdverts { }
