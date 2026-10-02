import { Component, signal } from '@angular/core';
import { RouterLink, RouterLinkActive } from '@angular/router';
import { Brand } from '../brand/brand';
import { AuthService } from '../../features/auth/services/auth-service';
import { ClickOutsideDirective } from '../../core/directives/click-outside.directive';
import { PopupWrapperComponent } from '../../features/general/components/popup-wrapper-component/popup-wrapper-component';
import { LoginPopupComponent } from '../../features/auth/components/login-popup-component/login-popup-component';
import { ProfilePopupComponent } from '../../features/general/components/profile-popup-component/profile-popup-component';
import { ClickableComponent } from '../../features/general/components/clickable-component/clickable-component';

@Component({
  selector: 'app-navbar',
  standalone: true,
  imports: [RouterLink, RouterLinkActive, Brand, LoginPopupComponent, ClickOutsideDirective, PopupWrapperComponent, ProfilePopupComponent, ClickableComponent],
  templateUrl: './navbar.html',
  styleUrl: './navbar.css',
})
export class Navbar {
  constructor(public authService: AuthService) { }
  loginPopUpState = signal<boolean>(false);
  profileDropdownState = signal<boolean>(false);

  toggleLoginPopUp() {
    this.loginPopUpState.update((prev) => !prev);
  }

  toggleProfileDropdown() {
    this.profileDropdownState.update((prev) => !prev);
  }

  closePopUps() {
    this.loginPopUpState.set(false);
    this.profileDropdownState.set(false);
  }

}
