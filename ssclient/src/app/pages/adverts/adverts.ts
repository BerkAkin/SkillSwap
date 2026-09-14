import { Component, signal } from '@angular/core';
import { AdvertCard } from '../../features/adverts/components/advert-card/advert-card';
import { IAdvertCard } from '../../features/adverts/models/IAdvertCard';
import { AdvertTable } from '../../features/adverts/components/advert-table/advert-table';

@Component({
  selector: 'app-adverts',
  imports: [AdvertCard, AdvertTable],
  templateUrl: './adverts.html',
  styleUrl: './adverts.css',
})
export class Adverts {
  temporaryAdvert = signal<IAdvertCard>({
    id: '1',
    skill: {
      title: 'C# Dersleri',
      description:
        'C# üzerine yoğun ve derinlemesine bilgi sahibiyim. 4 saatlik eğitim verebilirim',
    },
    username: 'Berk A',
    points: 1000,
  });
}
