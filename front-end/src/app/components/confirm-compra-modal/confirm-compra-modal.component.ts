import { Component } from '@angular/core';
import { Inject } from '@angular/core';
import { MAT_DIALOG_DATA, MatDialogRef } from '@angular/material/dialog';

@Component({
  selector: 'app-confirm-compra-modal',
  standalone: true,
  imports: [],
  template: `
    <div style="padding: 10px;">
      <h2>¡Compra realizada con éxito!</h2>
      <p>Tu compra se ha procesado correctamente.</p>
    </div>
  `,
  //templateUrl: './confirm-compra-modal.component.html',
  styleUrl: './confirm-compra-modal.component.css'
})
export class ConfirmCompraModalComponent {
  constructor(   
  ) {}
}
