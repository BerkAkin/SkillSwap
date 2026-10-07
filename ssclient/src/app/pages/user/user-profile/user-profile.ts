import { Component, OnInit } from '@angular/core';
import { AchievementService } from '../../../features/achievements/services/achievement-service';
import { UserInfoService } from '../../../features/user/services/user-info-service';
import { UserInfo } from '../../../features/user/components/user-info/user-info';
import { UserSocials } from '../../../features/user/components/user-socials/user-socials';
import { UserSkills } from '../../../features/user/components/user-skills/user-skills';
import { UserAchievements } from '../../../features/user/components/user-achievements/user-achievements';
import { UserSettings } from '../../../features/user/components/user-settings/user-settings';
import { UserOperations } from '../../../features/user/components/user-operations/user-operations';
import { SettingsService } from '../../../features/settings/services/settings-service';
import { SkillService } from '../../../features/skills/services/skill-service';

@Component({
  selector: 'app-user-profile',
  imports: [UserInfo, UserSocials, UserSkills, UserAchievements, UserSettings, UserOperations],
  templateUrl: './user-profile.html',
  styleUrl: './user-profile.css',
})
export class UserProfile implements OnInit {

  constructor(private userInfoService: UserInfoService,
    private achievementsService: AchievementService,
    private settingsService: SettingsService,
    private skillsService: SkillService) { }

  ngOnInit() {
    this.userInfoService.loadUserData();
    this.achievementsService.loadAchievements();
    this.settingsService.loadSettings();
    this.skillsService.loadSkills();
  }
}
