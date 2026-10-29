import { NgClass } from '@angular/common';
import { Component, input, } from '@angular/core';

@Component({
  selector: 'app-info-pill-component',
  imports: [NgClass],
  templateUrl: './info-pill-component.html',
  styleUrl: './info-pill-component.css',
})
export class InfoPillComponent {
  text = input<string | null>(null);
  colorScheme = input.required<'orange' | 'gray'>();

  defaultStyle = `text-sm font-rubik px-2 py-1 text-white font-semibold`

  getColorScheme = () => ({
    'orange': `bg-orange-500 ${this.defaultStyle}`,
    'gray': `bg-gray-700 ${this.defaultStyle}`,
  }[this.colorScheme() ?? '']);

}
