import { Component } from '@angular/core';
import { NgOptimizedImage } from '@angular/common';
import { SkillContainer } from '../../features/skills/components/skill-container/skill-container';

@Component({
  selector: 'app-top-info',
  imports: [NgOptimizedImage, SkillContainer],
  templateUrl: './top-info.html',
  styleUrl: './top-info.css',
})
export class TopInfo { }
