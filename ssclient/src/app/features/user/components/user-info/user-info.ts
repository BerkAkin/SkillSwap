import { Component } from '@angular/core';
import { UserInfoService } from '../../services/user-info-service';

@Component({
  selector: 'app-user-info',
  imports: [],
  templateUrl: './user-info.html',
  styleUrl: './user-info.css',
})
export class UserInfo {

  constructor(public userInfoService: UserInfoService) { }

}
