import { Component } from '@angular/core';
import { RegisterComponent } from '../../features/auth/components/register-component/register-component';
import { NgOptimizedImage } from '@angular/common';

@Component({
  selector: 'app-register',
  imports: [RegisterComponent, NgOptimizedImage],
  templateUrl: './register.html',
  styleUrl: './register.css',
})
export class Register { }
