import { Component, Inject } from '@angular/core';
import { MAT_DIALOG_DATA, MatDialogRef } from '@angular/material/dialog';
import { CommonModule } from '@angular/common';
import { MaterialModule } from '../../../material.module';
import { HttpClientModule } from '@angular/common/http'; 
import { ProductService } from '../../../services/product.service';
import { ClothingService } from '../../../services/clothing.service';
import { SupplementService } from '../../../services/supplements.service';

@Component({
  selector: 'app-deletedialog',
  standalone: true,
  imports: [CommonModule, MaterialModule, HttpClientModule],
  providers: [ProductService, ClothingService, SupplementService],
  templateUrl: './deletedialog.component.html',
  styleUrl: './deletedialog.component.css'
})
export class DeletedialogComponent {

  constructor(
		public dialogRef: MatDialogRef<DeletedialogComponent>,
		private _productService : ProductService,
		private _clothingService : ClothingService, 
		private _supplementService : SupplementService, 
		@Inject(MAT_DIALOG_DATA) public data : any
	) {}

  onNoClick(): void {
		this.dialogRef.close();
	}
	// confirm delete
	onYesClick(): void {

		console.log(this.data.product.product.type); 

		if(this.data.product.product.type === "ropa"){
			console.log("entra eliminar ropa"); 
			this._clothingService.deleteClothing(this.data.product.product.id).subscribe(
				(response) => {
					this.dialogRef.close(true);
				},
				(error) => {
				  console.error('Error deleting ropa:', error);
				}
			  );
		}
		else{
			console.log("entra eliminar suppl"); 
			this._supplementService.deleteSupplement(this.data.product.product.id).subscribe(
				(response) => {
					this.dialogRef.close(true);
				},
				(error) => {
				  console.error('Error deleting suplemento:', error);
				}
			  );
		}

		this._productService.deleteProduct(this.data.product.product.id).subscribe(
			(response) => {
				this.dialogRef.close(true);
			},
			(error) => {
			  console.error('Error deleting producto:', error);
			}
		  );

	}
}
