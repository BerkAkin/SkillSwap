import { Component, ElementRef } from '@angular/core';
import { FormControl, FormGroup, ReactiveFormsModule, Validators } from '@angular/forms';
import { AuthService } from '../../services/auth-service';
import { ClickableComponent } from '../../../general/components/clickable-component/clickable-component';

@Component({
  selector: 'app-login-popup',
  imports: [ReactiveFormsModule, ClickableComponent],
  templateUrl: './login-popup.html',
  styleUrl: './login-popup.css',
})
export class LoginPopup {

  constructor(private authService: AuthService) { }


  onSubmitHandler = () => {
    const { email, password } = this.loginForm.getRawValue();

    if (!email || !password) {
      return;
    }

    this.authService.login({ email, password }).subscribe({
      next: () => {
        console.log("Login Success");
      },
      error: (error) => {
        console.log("Login error", error)
      }
    })
  }

  loginForm = new FormGroup({
    email: new FormControl<string>('', {
      nonNullable: true,
      validators: [Validators.email, Validators.required]
    }),
    password: new FormControl<string>('', {
      nonNullable: true,
      validators: [Validators.required]
    }),
  });
}
