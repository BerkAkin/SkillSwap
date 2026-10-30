import { Component } from '@angular/core';
import { UserAdvertDetailsService } from '../../services/user-advert-details-service';
import { DatePipe } from '@angular/common';

@Component({
  selector: 'app-user-advert-details',
  imports: [DatePipe],
  templateUrl: './user-advert-details.html',
  styleUrl: './user-advert-details.css',
})
export class UserAdvertDetails {
  constructor(public userAdvertDetailService: UserAdvertDetailsService) { }
}
