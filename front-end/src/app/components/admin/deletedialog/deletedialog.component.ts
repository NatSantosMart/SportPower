import { Component, Inject } from '@angular/core';
import { MAT_DIALOG_DATA, MatDialogRef } from '@angular/material/dialog';
import { CommonModule } from '@angular/common';
import { MaterialModule } from '../../../material.module';

@Component({
  selector: 'app-deletedialog',
  standalone: true,
  imports: [CommonModule, MaterialModule],
  templateUrl: './deletedialog.component.html',
  styleUrl: './deletedialog.component.css'
})
export class DeletedialogComponent {

  constructor(
		public dialogRef: MatDialogRef<DeletedialogComponent>,
		@Inject(MAT_DIALOG_DATA) public data : any
	) {}

  onNoClick(): void {
		this.dialogRef.close();
	}
	// confirm delete
	onYesClick(): void {
		this.dialogRef.close(true);
	}
}
