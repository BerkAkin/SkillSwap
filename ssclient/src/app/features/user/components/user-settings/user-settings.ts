import { Component } from '@angular/core';
import { UserInfoService } from '../../services/user-info-service';
import { SettingsService } from '../../../settings/services/settings-service';
import { HttpClient } from '@angular/common/http';
import { API_ENDPOINTS } from '../../../../core/constants/api-endpoints';
import { tap } from 'rxjs';

@Component({
  selector: 'app-user-settings',
  imports: [],
  templateUrl: './user-settings.html',
  styleUrl: './user-settings.css',
})
export class UserSettings {
  constructor(private httpClient: HttpClient, public userInfoService: UserInfoService, public settingService: SettingsService) { }

  updateSetting = (id: number) => {
    this.httpClient.put(API_ENDPOINTS.me.setting + `/${id}`, null)
      .pipe(
        tap()
      )
      .subscribe({
        next: (response) => console.log("Setting updated successfully", response),
        error: (err) => console.log("An error has occured while trying to update settings", err)
      })
  }
}
