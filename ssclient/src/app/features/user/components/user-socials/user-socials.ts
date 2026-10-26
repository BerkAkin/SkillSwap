import { Component, signal } from '@angular/core';
import { UserInfoService } from '../../services/user-info-service';
import { ClickableComponent } from '../../../general/components/clickable-component/clickable-component';
import { HttpClient } from '@angular/common/http';
import { API_ENDPOINTS } from '../../../../core/constants/api-endpoints';
import { tap } from 'rxjs';
import { IUserDataResponseModel } from '../../../../pages/user/models/IUserDataResponseModel';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-user-socials',
  imports: [ClickableComponent, FormsModule],
  templateUrl: './user-socials.html',
  styleUrl: './user-socials.css',
})
export class UserSocials {
  constructor(public userInfoService: UserInfoService, private httpClient: HttpClient) { }

  selectedSocial = signal<string | null>(null);
  selectedSocialInput = signal<string | null>(null);

  setSelectedSocial(id: string, text: string) {
    if (this.selectedSocial() === id) {
      console.log()
      this.selectedSocial.set(null);
      this.selectedSocialInput.set(null);
    } else {
      this.selectedSocial.set(id);
      this.selectedSocialInput.set(text)
    }
  }

  updateSocial() {
    this.httpClient.put<IUserDataResponseModel>(`${API_ENDPOINTS.me.social}/${this.selectedSocial()}`, { url: this.selectedSocialInput() })
      .pipe(tap())
      .subscribe({
        next: (response) => { console.log(response.message) },
        error: (err) => { console.log("An error has occured while updating the social", err) }
      })
  }
}
