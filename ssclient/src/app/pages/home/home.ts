import { Component } from '@angular/core';
import { SkillPill } from '../../features/skills/components/skill-pill/skill-pill';
import { InfoBox } from '../../features/infos/components/info-box/info-box';
import { InfoCard } from '../../features/infos/components/info-card/info-card';
import { IInfoCardModel } from '../../features/infos/models/IInfoCardModel';

@Component({
  selector: 'app-home',
  imports: [SkillPill, InfoBox, InfoCard],
  templateUrl: './home.html',
  styleUrl: './home.css',
})
export class Home {
  cards: IInfoCardModel[] = [
    {
      title: 'Engineering',
      description: 'Software development, DevOps, system design, and modern technologies.',
      color: 'orange',
      icon: '⌘',
    },
    {
      title: 'Daily Life',
      description: 'Fitness, languages, productivity, and practical everyday skills.',
      color: 'sky',
      icon: '✦',
    },
    {
      title: 'Cooking',
      description: 'Recipes, baking, cooking techniques, and world cuisines.',
      color: 'orange',
      icon: '⌁ ',
    },
    {
      title: 'Soft Skills',
      description: 'Communication, leadership, teamwork, and personal growth.',
      color: 'sky',
      icon: '◇',
    },
  ];
}
