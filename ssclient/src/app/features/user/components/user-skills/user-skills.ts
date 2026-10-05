import { Component } from '@angular/core';
import { UserInfoService } from '../../services/user-info-service';
import { SkillService } from '../../../skills/services/skill-service';
import { ClickableComponent } from '../../../general/components/clickable-component/clickable-component';

@Component({
  selector: 'app-user-skills',
  imports: [ClickableComponent],
  templateUrl: './user-skills.html',
  styleUrl: './user-skills.css',
})
export class UserSkills {
  constructor(public userInfoService: UserInfoService, public skillService: SkillService) { }

  removeSkill(id: string, from: 'skills' | 'wishlist') {
    alert(`${id} - ${from} sil`);
  }

  addSkill(id: string, to: 'skills' | 'wishlist') {
    alert(`${id} - ${to} ekle`);
  }
}
