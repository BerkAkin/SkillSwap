import { Component } from '@angular/core';
import { RouterOutlet } from '@angular/router';
import { Navbar } from './layout/navbar/navbar';
import { Footer } from './layout/footer/footer';
import { ModalComponent } from './features/general/components/modal-component/modal-component';

@Component({
  selector: 'app-root',
  imports: [RouterOutlet, Navbar, Footer, ModalComponent],
  templateUrl: './app.html',
  styleUrl: './app.css',
})
export class App { }
