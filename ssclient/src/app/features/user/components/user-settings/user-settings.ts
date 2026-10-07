import { Component } from '@angular/core';
import { UserInfoService } from '../../services/user-info-service';
import { SettingsService } from '../../../settings/services/settings-service';

@Component({
  selector: 'app-user-settings',
  imports: [],
  templateUrl: './user-settings.html',
  styleUrl: './user-settings.css',
})
export class UserSettings {
  constructor(public userInfoService: UserInfoService, public settingService: SettingsService) { }
}
