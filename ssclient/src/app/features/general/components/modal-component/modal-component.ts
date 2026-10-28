import { Component } from '@angular/core';
import { ModalControlService } from '../../services/modal-control-service';
import { NgComponentOutlet } from '@angular/common';

@Component({
  selector: 'app-modal-component',
  imports: [NgComponentOutlet],
  templateUrl: './modal-component.html',
  styleUrl: './modal-component.css',
})
export class ModalComponent {
  constructor(public modalService: ModalControlService) { }
}
