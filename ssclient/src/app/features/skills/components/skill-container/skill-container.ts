import { Component, OnInit } from '@angular/core';
import { SkillService } from '../../services/skill-service';
import { SkillPill } from '../skill-pill/skill-pill';

@Component({
  selector: 'app-skill-container',
  imports: [SkillPill],
  templateUrl: './skill-container.html',
  styleUrl: './skill-container.css',
})
export class SkillContainer implements OnInit {

  constructor(public skillService: SkillService) { }

  ngOnInit() {
    this.skillService.loadSkills();
  }
}
