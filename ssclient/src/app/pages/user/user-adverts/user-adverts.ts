import { Component, OnInit } from '@angular/core';
import { AdvertCreator } from '../../../features/adverts/components/advert-creator/advert-creator';
import { UserAdvertList } from '../../../features/user/components/user-advert-list/user-advert-list';
import { UserAdvertService } from '../../../features/user/services/user-advert-service';
import { UserAdvertDetails } from '../../../features/user/components/user-advert-details/user-advert-details';

@Component({
  selector: 'app-my-adverts',
  imports: [AdvertCreator, UserAdvertList, UserAdvertDetails],
  templateUrl: './user-adverts.html',
  styleUrl: './user-adverts.css',
})
export class UserAdverts implements OnInit {
  constructor(public userAdvertService: UserAdvertService,) { }

  ngOnInit() {
    this.userAdvertService.loadUserAdverts();
  }

}
