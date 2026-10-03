import { Component } from '@angular/core';
import { NgOptimizedImage } from '@angular/common';
import { RegisterForm } from '../../features/auth/components/register-form/register-form';

@Component({
  selector: 'app-register',
  imports: [RegisterForm, NgOptimizedImage],
  templateUrl: './register.html',
  styleUrl: './register.css',
})
export class Register { }
