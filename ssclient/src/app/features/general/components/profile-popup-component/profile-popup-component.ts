import { Component } from '@angular/core';
import { RouterLink } from '@angular/router';
import { AuthService } from '../../../auth/services/auth-service';
import { ClickableComponent } from '../clickable-component/clickable-component';

@Component({
  selector: 'app-profile-popup-component',
  imports: [RouterLink, ClickableComponent],
  templateUrl: './profile-popup-component.html',
  styleUrl: './profile-popup-component.css',
})
export class ProfilePopupComponent {
  constructor(public authService: AuthService) { }

}
