import { Component } from '@angular/core';
import { AuthService } from '../../services/auth-service';
import { FormControl, FormGroup, Validators, ReactiveFormsModule, } from '@angular/forms';
import { IRegisterResponse } from '../../models/IRegisterResponse';
import { ClickableComponent } from '../../../general/components/clickable-component/clickable-component';

@Component({
  selector: 'app-register-form',
  imports: [ReactiveFormsModule, ClickableComponent],
  templateUrl: './register-form.html',
  styleUrl: './register-form.css',
})
export class RegisterForm {
  constructor(private authService: AuthService) { }

  registerForm = new FormGroup({
    'firstname': new FormControl<string>('', { nonNullable: true, validators: [Validators.required,] }),
    'lastname': new FormControl<string>('', { nonNullable: true, validators: [Validators.required] }),
    'phone_number': new FormControl<string>('', { nonNullable: true, validators: [Validators.required, Validators.maxLength(11)] }),
    'email': new FormControl<string>('', { nonNullable: true, validators: [Validators.required, Validators.email] }),
    'password': new FormControl<string>('', { nonNullable: true, validators: [Validators.required, Validators.minLength(8)] }),
    'gender': new FormControl<string>('', { nonNullable: true, validators: [Validators.required] }),
  });

  onSubmitHandler = () => {

    const { firstname, lastname, email, password, phone_number, gender } = this.registerForm.getRawValue();

    if (!firstname || !lastname || !email || !password || !phone_number || !gender) {
      return;
    }

    this.authService.register({ firstname, lastname, phone_number, email, password, gender }).subscribe({
      next: (response: IRegisterResponse) => {
        console.log(response)
        localStorage.setItem("ss-access-token", response.data.token);

      },
      error: (error) => { console.log('error', error) },
    });
  }
}
