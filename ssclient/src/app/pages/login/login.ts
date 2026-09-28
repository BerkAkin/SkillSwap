import { Component } from '@angular/core';
import { FormControl, FormGroup, ReactiveFormsModule, Validators } from '@angular/forms';
import { AuthService } from '../../services/auth-service';

@Component({
  selector: 'app-login',
  imports: [ReactiveFormsModule],
  templateUrl: './login.html',
  styleUrl: './login.css',
})
export class Login {

  constructor(private authService: AuthService) { }


  onSubmitHandler = () => {
    if (!this.loginForm.value.email || !this.loginForm.value.password) { return; }
    this.authService.login({
      email: this.loginForm.value.email, password: this.loginForm.value.password
    }).subscribe({
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
