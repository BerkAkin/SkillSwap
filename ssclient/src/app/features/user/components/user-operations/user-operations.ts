import { Component } from '@angular/core';
import { ClickableComponent } from '../../../general/components/clickable-component/clickable-component';
import { ModalControlService } from '../../../general/services/modal-control-service';
import { ConfirmationDialog } from '../../../general/components/confirmation-dialog/confirmation-dialog';
import { PasswordResetDialog } from '../../../general/components/password-reset-dialog/password-reset-dialog';


@Component({
  selector: 'app-user-operations',
  imports: [ClickableComponent],
  templateUrl: './user-operations.html',
  styleUrl: './user-operations.css',
})
export class UserOperations {

  constructor(public modalService: ModalControlService) { }
  PasswordResetDialog = PasswordResetDialog;
  ConfirmationDialog = ConfirmationDialog;

  openDeactivateModal() {
    this.modalService.setModal(
      ConfirmationDialog,
      "Deactivate Account !",
      {
        description: "Are you sure you really wanna deactivate your account ?",
        confirmFunction: () => console.log("Hesap silindi")
      }
    );
  }

  openPasswordResetModal() {
    this.modalService.setModal(
      PasswordResetDialog,
      "Reset Password",
    )
  }
}
