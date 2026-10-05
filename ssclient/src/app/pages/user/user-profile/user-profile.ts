import { Component, OnInit, signal } from '@angular/core';
import { UserInfoService } from '../services/user-info-service';
import { ClickableComponent } from '../../../features/general/components/clickable-component/clickable-component';
import { AchievementService } from '../../../features/achievements/services/achievement-service';
import { NgOptimizedImage } from '@angular/common';
import { TooltipDirective } from '../../../core/directives/tooltip.directive';

@Component({
  selector: 'app-user-profile',
  imports: [ClickableComponent, NgOptimizedImage, TooltipDirective],
  templateUrl: './user-profile.html',
  styleUrl: './user-profile.css',
})
export class UserProfile implements OnInit {

  constructor(public userInfoService: UserInfoService, public achievementsService: AchievementService) { }

  ngOnInit() {
    this.userInfoService.getUserData();
    this.achievementsService.getAchievements();
  }
}
