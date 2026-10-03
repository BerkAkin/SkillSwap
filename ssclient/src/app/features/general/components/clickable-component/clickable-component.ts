import { Component, input } from '@angular/core';
import { IClickableModel } from '../../models/IClickableModel';
import { RouterLink } from '@angular/router';
import { NgClass } from '@angular/common';

@Component({
  selector: 'app-clickable-component',
  imports: [RouterLink, NgClass],
  templateUrl: './clickable-component.html',
  styleUrl: './clickable-component.css',
  standalone: true
})
export class ClickableComponent {
  properties = input.required<IClickableModel>();
  defaultBtnProps = "inline-flex  hover:text-white border font-bold  cursor-pointer px-4 font-medium transition font-rubik"

  getStyle = () => ({
    'emerald': `border-emerald-600 bg-white hover:bg-emerald-600 text-emerald-600 ${this.defaultBtnProps}`,
    'orange': `border-orange-500 bg-white hover:bg-orange-500 text-orange-500 ${this.defaultBtnProps}`,
    'red': `border-red-500 bg-white hover:bg-red-500 text-red-500  ${this.defaultBtnProps}`,
    'sky': `border-sky-500 bg-white hover:bg-sky-500 text-sky-500 ${this.defaultBtnProps}`,
    'stone': `border-gray-700 bg-white hover:bg-gray-700 text-gray-700 ${this.defaultBtnProps}`,
  }[this.properties().colorScheme] ?? '');


}
