import { Component } from '@angular/core';
import { RouterOutlet } from '@angular/router';
import { Navbar } from './layout/navbar/navbar';
import { Footer } from './layout/footer/footer';
import { TopInfo } from './features/infos/components/top-info/top-info';

@Component({
  selector: 'app-root',
  imports: [RouterOutlet, Navbar, Footer, TopInfo],
  templateUrl: './app.html',
  styleUrl: './app.css',
})
export class App { }
