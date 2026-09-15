import { Component } from '@angular/core';
import { SkillPill } from '../../features/skills/components/skill-pill/skill-pill';
import { InfoBox } from '../../features/infos/components/info-box/info-box';
import { InfoCard } from '../../features/infos/components/info-card/info-card';
import { IInfoCardModel } from '../../features/infos/models/IInfoCardModel';
import { InfoSection } from '../../features/infos/components/info-section/info-section';
import { ICommentCardModel } from '../../features/infos/models/ICommentCardModel';
import { CommentCard } from '../../features/comments/components/comment-card/comment-card';

@Component({
  selector: 'app-home',
  imports: [SkillPill, InfoBox, InfoCard, InfoSection, CommentCard],
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

  comments: ICommentCardModel[] = [
    {
      user: 'Berk A.',
      comment:
        'Skillswap makes it really easy to find people who can teach the skills I want to learn. The whole experience feels simple and intuitive.',
      point: 5,
    },
    {
      user: 'Pelin G.',
      comment:
        'The platform is very easy to navigate. Finding a skill, checking the details, and connecting with someone takes only a few minutes.',
      point: 4,
    },
    {
      user: 'Eşref K.',
      comment:
        'SkillSwap is a great way to both learn something new and share skills you already have. It makes learning feel more social.',
      point: 5,
    },
    {
      user: 'Selin D.',
      comment:
        'I found the skill categories really useful. It helped me quickly find topics that matched what I wanted to learn.',
      point: 4,
    },
  ];
}
