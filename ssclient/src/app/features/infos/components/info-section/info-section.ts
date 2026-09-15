import { Component, input } from '@angular/core';
import { Brand } from '../../../../layout/brand/brand';

@Component({
  selector: 'app-info-section',
  imports: [Brand],
  templateUrl: './info-section.html',
  styleUrl: './info-section.css',
})
export class InfoSection {
  header = input<string>('');
}
