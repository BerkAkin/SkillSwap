import { Component, input, signal } from '@angular/core';

@Component({
  selector: 'app-confirmation-dialog',
  imports: [],
  templateUrl: './confirmation-dialog.html',
  styleUrl: './confirmation-dialog.css',
})
export class ConfirmationDialog {
  description = input.required<string>();
  confirmFunction = input.required<() => any>();

  confirmAction() {
    this.confirmFunction()();
  }
}
