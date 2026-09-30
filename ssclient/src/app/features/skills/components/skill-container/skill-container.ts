import { Component, OnInit, signal } from '@angular/core';
import { SkillService } from '../../services/skill-service';
import { SkillPill } from '../skill-pill/skill-pill';
import { ISkillModel } from '../../models/ISkillModel';

@Component({
  selector: 'app-skill-container',
  imports: [SkillPill],
  templateUrl: './skill-container.html',
  styleUrl: './skill-container.css',
})
export class SkillContainer implements OnInit {

  constructor(private skillService: SkillService) { }
  skills = signal<ISkillModel[] | null>(null);

  ngOnInit() {
    this.skillService.getSkills().subscribe({
      next: (response) => {
        this.skills.set(response.data);
      },
      error: (error) => { console.log("error: ", error); }
    })
  }
}
