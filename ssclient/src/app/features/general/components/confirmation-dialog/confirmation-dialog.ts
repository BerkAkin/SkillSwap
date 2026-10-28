import { Component, input } from '@angular/core';

@Component({
  selector: 'app-confirmation-dialog',
  imports: [],
  templateUrl: './confirmation-dialog.html',
  styleUrl: './confirmation-dialog.css',
})
export class ConfirmationDialog {
  description = input.required<string>();
  confirmActionFn = input.required<() => any>();
  confirm() {
    this.confirmActionFn()();
  }
}
