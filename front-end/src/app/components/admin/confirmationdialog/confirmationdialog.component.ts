import { CommonModule } from '@angular/common';
import { Component, Inject } from '@angular/core';
import { MaterialModule } from '../../../material.module';
import { MAT_DIALOG_DATA, MatDialogRef } from '@angular/material/dialog';

@Component({
  selector: 'app-confirmationdialog',
  standalone: true,
  imports: [CommonModule, MaterialModule],
  templateUrl: './confirmationdialog.component.html',
  styleUrl: './confirmationdialog.component.css'
})
export class ConfirmationdialogComponent {
  constructor(
		public dialogRef: MatDialogRef<ConfirmationdialogComponent>,
		@Inject(MAT_DIALOG_DATA) public data : any
	) {}

}
