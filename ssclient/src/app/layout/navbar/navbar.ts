import { Component } from '@angular/core';
import { RouterLink, RouterLinkActive } from '@angular/router';
import { Brand } from '../brand/brand';

@Component({
  selector: 'app-navbar',
  standalone: true,
  imports: [RouterLink, RouterLinkActive, Brand],
  templateUrl: './navbar.html',
  styleUrl: './navbar.css',
})
export class Navbar {}
