import { Component } from '@angular/core';
import { FormControl, FormGroup, ReactiveFormsModule, Validators } from '@angular/forms';
import { AuthService } from '../../services/auth-service';

@Component({
  selector: 'app-login-component',
  imports: [ReactiveFormsModule],
  templateUrl: './login-component.html',
  styleUrl: './login-component.css',
})
export class Login {

  constructor(private authService: AuthService) { }


  onSubmitHandler = () => {
    const { email, password } = this.loginForm.getRawValue();

    if (!email || !password) {
      return;
    }

    this.authService.login({ email, password }).subscribe({
      next: (response) => {
        console.log(response);
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
