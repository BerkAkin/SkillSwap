import { Component } from '@angular/core';
import { RouterLink, RouterLinkActive } from '@angular/router';
import { Brand } from '../brand/brand';

@Component({
  selector: 'app-footer',
  standalone: true,
  imports: [RouterLink, RouterLinkActive, Brand],
  templateUrl: './footer.html',
  styleUrl: './footer.css',
})
export class Footer {}
