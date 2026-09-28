import { Component, input } from '@angular/core';
import { IAdvertResponse } from '../../models/IAdvertResponse';

@Component({
  selector: 'app-advert-table',
  imports: [],
  templateUrl: './advert-table.html',
  styleUrl: './advert-table.css',
})
export class AdvertTable {
  data = input<IAdvertResponse | null>(null);
}
