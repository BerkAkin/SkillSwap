import { Component, ElementRef } from '@angular/core';
import { FormControl, FormGroup, ReactiveFormsModule, Validators } from '@angular/forms';
import { AuthService } from '../../services/auth-service';
import { ClickableComponent } from '../../../general/components/clickable-component/clickable-component';

@Component({
  selector: 'app-login-popup-component',
  imports: [ReactiveFormsModule, ClickableComponent],
  templateUrl: './login-popup-component.html',
  styleUrl: './login-popup-component.css',
})
export class LoginPopupComponent {

  constructor(private authService: AuthService) { }


  onSubmitHandler = () => {
    const { email, password } = this.loginForm.getRawValue();

    if (!email || !password) {
      return;
    }

    this.authService.login({ email, password }).subscribe({
      next: (response) => {
        localStorage.setItem("ss-access-token", response.data);
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
