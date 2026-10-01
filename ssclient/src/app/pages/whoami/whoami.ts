import { Component } from '@angular/core';
import { Brand } from '../../layout/brand/brand';
import { NgOptimizedImage } from '@angular/common';
import { InfoBox } from '../../features/infos/components/info-box/info-box';

@Component({
  selector: 'app-whoami',
  imports: [Brand, NgOptimizedImage, InfoBox],
  templateUrl: './whoami.html',
  styleUrl: './whoami.css',
})
export class Whoami { }
