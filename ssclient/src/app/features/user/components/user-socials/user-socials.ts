import { Component } from '@angular/core';
import { UserInfoService } from '../../services/user-info-service';
import { ClickableComponent } from '../../../general/components/clickable-component/clickable-component';

@Component({
  selector: 'app-user-socials',
  imports: [ClickableComponent],
  templateUrl: './user-socials.html',
  styleUrl: './user-socials.css',
})
export class UserSocials {
  constructor(public userInfoService: UserInfoService) { }

  removeSocial(id: string) {
    alert(id);
  }
}
