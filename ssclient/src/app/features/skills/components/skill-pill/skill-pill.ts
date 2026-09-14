import { Component, input } from '@angular/core';

@Component({
  selector: 'app-skill-pill',
  imports: [],
  templateUrl: './skill-pill.html',
  styleUrl: './skill-pill.css',
})
export class SkillPill {
  colorScheme = input<'orange' | 'sky'>('orange');
  text = input<string | null>('');

  get colorClasses() {
    return {
      orange: 'bg-orange-500 border-orange-600',
      sky: 'bg-sky-500 border-sky-600',
    }[this.colorScheme()];
  }
}
