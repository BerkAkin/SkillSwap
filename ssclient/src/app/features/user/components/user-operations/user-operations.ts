import { Component } from '@angular/core';
import { ClickableComponent } from '../../../general/components/clickable-component/clickable-component';
import { ModalControlService } from '../../../general/services/modal-control-service';
import { ConfirmationDialog } from '../../../general/components/confirmation-dialog/confirmation-dialog';

@Component({
  selector: 'app-user-operations',
  imports: [ClickableComponent],
  templateUrl: './user-operations.html',
  styleUrl: './user-operations.css',
})
export class UserOperations {
  ConfirmationDialog = ConfirmationDialog;
  constructor(public modalControlService: ModalControlService) { }

  openDeactivateDialog() {
    this.modalControlService.setModal(
      "Deactivate Your Account !",
      ConfirmationDialog,
      {
        description: "Are you really sure you want to deactivate your account ?",
        confirmActionFn: () => { console.log("Your account is now deactivated") },
      }

    );
  }
}
