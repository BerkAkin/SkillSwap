import { Component, OnInit } from '@angular/core';
import { AdvertCreator } from '../../../features/adverts/components/advert-creator/advert-creator';
import { UserAdvertList } from '../../../features/user/components/user-advert-list/user-advert-list';
import { UserAdvertService } from '../../../features/user/services/user-advert-service';

@Component({
  selector: 'app-my-adverts',
  imports: [AdvertCreator, UserAdvertList],
  templateUrl: './user-adverts.html',
  styleUrl: './user-adverts.css',
})
export class UserAdverts implements OnInit {
  constructor(private userAdvertService: UserAdvertService,) { }

  ngOnInit() {
    this.userAdvertService.loadUserAdverts();
  }

}
