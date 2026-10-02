import { Component, OnInit, signal } from '@angular/core';
import { AdvertCard } from '../../features/adverts/components/advert-card/advert-card';
import { AdvertTable } from '../../features/adverts/components/advert-table/advert-table';
import { AdvertsService } from '../../features/adverts/services/adverts-service';
import { IAdvertResponse } from '../../features/adverts/models/IAdvertResponse';
import { ClickableComponent } from '../../features/general/components/clickable-component/clickable-component';

@Component({
  selector: 'app-adverts',
  imports: [AdvertCard, AdvertTable, ClickableComponent],
  templateUrl: './adverts.html',
  styleUrl: './adverts.css',
})
export class Adverts implements OnInit {
  adverts = signal<IAdvertResponse | null>(null);
  constructor(private advertsService: AdvertsService) { }

  ngOnInit(): void {
    this.advertsService.getAdverts().subscribe({
      next: (response) => {
        this.adverts.set(response);
      },
      error: () => {
        console.log("Error fetching adverts");
      }
    });
  }
}