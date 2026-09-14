import { Component, input, Input } from '@angular/core';
import { IInfoCardModel } from '../../models/IInfoCardModel';
import { NgClass } from '@angular/common';
@Component({
  selector: 'app-info-card',
  imports: [NgClass],
  templateUrl: './info-card.html',
  styleUrl: './info-card.css',
})
export class InfoCard {
  data = input.required<IInfoCardModel>();
}
