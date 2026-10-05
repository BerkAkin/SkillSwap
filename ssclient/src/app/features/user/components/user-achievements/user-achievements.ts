import { Component } from '@angular/core';
import { UserInfoService } from '../../services/user-info-service';
import { AchievementService } from '../../../achievements/services/achievement-service';
import { TooltipDirective } from '../../../../core/directives/tooltip.directive';
import { NgOptimizedImage } from '@angular/common';

@Component({
  selector: 'app-user-achievements',
  imports: [TooltipDirective, NgOptimizedImage],
  templateUrl: './user-achievements.html',
  styleUrl: './user-achievements.css',
})
export class UserAchievements {
  constructor(public userInfoService: UserInfoService, public achievementsService: AchievementService) { }

}
