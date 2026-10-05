import { Component, OnInit } from '@angular/core';
import { AdvertCard } from '../../features/adverts/components/advert-card/advert-card';
import { AdvertTable } from '../../features/adverts/components/advert-table/advert-table';
import { AdvertsService } from '../../features/adverts/services/adverts-service';
import { ClickableComponent } from '../../features/general/components/clickable-component/clickable-component';
import { TopInfo } from '../../features/infos/components/top-info/top-info';

@Component({
  selector: 'app-adverts',
  imports: [AdvertCard, AdvertTable, ClickableComponent, TopInfo],
  templateUrl: './adverts.html',
  styleUrl: './adverts.css',
})
export class Adverts implements OnInit {
  constructor(public advertsService: AdvertsService) { }

  ngOnInit() {
    this.advertsService.getAdverts();
  }

}