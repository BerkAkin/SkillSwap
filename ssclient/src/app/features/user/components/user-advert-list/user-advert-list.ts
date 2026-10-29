import { Component } from '@angular/core';
import { UserAdvertService } from '../../services/user-advert-service';
import { InfoPillComponent } from '../../../general/components/info-pill-component/info-pill-component';
import { DatePipe } from '@angular/common';

@Component({
  selector: 'app-user-advert-list',
  imports: [InfoPillComponent, DatePipe],
  templateUrl: './user-advert-list.html',
  styleUrl: './user-advert-list.css',
})
export class UserAdvertList {
  constructor(public userAdvertService: UserAdvertService) { }
}
