import { Component } from '@angular/core';
import { FormControl, FormGroup, Validators, ReactiveFormsModule } from '@angular/forms';

@Component({
  selector: 'app-password-reset-dialog',
  imports: [ReactiveFormsModule],
  templateUrl: './password-reset-dialog.html',
  styleUrl: './password-reset-dialog.css',
})
export class PasswordResetDialog {

  resetForm = new FormGroup({
    'currentPassword': new FormControl<string>('', {
      nonNullable: true, validators: [Validators.required]
    }),
  });

  resetAction() {
    const { currentPassword } = this.resetForm.getRawValue();
    if (!currentPassword) {
      return;
    }
    console.log(currentPassword);
  }
}
