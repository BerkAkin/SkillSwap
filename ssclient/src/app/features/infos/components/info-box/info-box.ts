import { NgOptimizedImage } from '@angular/common';
import { Component, input } from '@angular/core';
import { Brand } from '../../../../layout/brand/brand';

@Component({
  selector: 'app-info-box',
  imports: [NgOptimizedImage, Brand],
  templateUrl: './info-box.html',
  styleUrl: './info-box.css',
})
export class InfoBox {
  imagePath = input<string | null>();
  contentHeader = input<string | null>();
  content = input<string | null>();
}
