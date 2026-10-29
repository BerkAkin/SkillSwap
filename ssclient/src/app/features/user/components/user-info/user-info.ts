import { Component, signal } from '@angular/core';
import { UserInfoService } from '../../services/user-info-service';
import { HttpClient } from '@angular/common/http';
import { FormsModule } from '@angular/forms';
import { ClickableComponent } from '../../../general/components/clickable-component/clickable-component';

type EditableKey = 'firstname' | 'lastname' | 'email' | 'phone_number';

@Component({
  selector: 'app-user-info',
  imports: [FormsModule, ClickableComponent],
  templateUrl: './user-info.html',
  styleUrl: './user-info.css',
})


export class UserInfo {
  constructor(public userInfoService: UserInfoService, private HttpClient: HttpClient) { }

  editableFields: { key: EditableKey; label: string; }[] = [
    {
      key: 'firstname',
      label: 'Firstname'
    },
    {
      key: 'lastname',
      label: 'Lastname'
    },
    {
      key: 'email',
      label: 'E-Mail'
    },
    {
      key: 'phone_number',
      label: 'Phone'
    },
  ];


  selectedField = signal<string | null>(null);
  selectedFieldValue = signal<string>("");

  editField(key: EditableKey) {
    this.selectedField.set(key);
    this.selectedFieldValue.set(
      String(this.userInfoService.userdata()?.[key] ?? '')
    );
  }

  updateInfo() {
    this.userInfoService.updateInfo(this.selectedField()!, this.selectedFieldValue()!);
  }

}
