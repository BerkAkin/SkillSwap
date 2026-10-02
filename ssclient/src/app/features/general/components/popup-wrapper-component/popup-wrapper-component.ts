import { Component, input } from '@angular/core';

@Component({
  selector: 'app-popup-wrapper-component',
  imports: [],
  templateUrl: './popup-wrapper-component.html',
  styleUrl: './popup-wrapper-component.css',
})
export class PopupWrapperComponent {
  constructor() { }
  title = input<string>();

}