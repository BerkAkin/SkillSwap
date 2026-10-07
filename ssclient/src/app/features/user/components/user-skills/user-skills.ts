import { Component, signal } from '@angular/core';
import { UserInfoService } from '../../services/user-info-service';
import { SkillService } from '../../../skills/services/skill-service';
import { ClickableComponent } from '../../../general/components/clickable-component/clickable-component';
import { UserSkillsService } from '../../services/user-skills-service';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-user-skills',
  imports: [ClickableComponent, FormsModule],
  templateUrl: './user-skills.html',
  styleUrl: './user-skills.css',
})
export class UserSkills {
  constructor(public userInfoService: UserInfoService,
    public skillService: SkillService,
    public userSkillService: UserSkillsService) { }

  currentSkillSelectValue = '';
  currentWishlistSelectValue = '';

}
