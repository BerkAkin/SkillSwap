import { Component } from '@angular/core';
import { RouterLink, RouterLinkActive } from '@angular/router';
import { Brand } from '../brand/brand';
import { Login } from '../../features/auth/components/login-component/login-component';

@Component({
  selector: 'app-navbar',
  standalone: true,
  imports: [RouterLink, RouterLinkActive, Brand, Login],
  templateUrl: './navbar.html',
  styleUrl: './navbar.css',
})
export class Navbar {
  loginState: boolean = false;
  toggleLogin() {
    this.loginState = !this.loginState;
  }
}
