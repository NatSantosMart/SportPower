import { CommonModule } from '@angular/common';
import { Component, Inject, OnInit } from '@angular/core';
import { MaterialModule } from '../../../material.module';
import { MAT_DIALOG_DATA, MatDialogRef } from '@angular/material/dialog';
import { FormsModule } from '@angular/forms';
import { Product } from '../../../models/product.model';

@Component({
  selector: 'app-addeditproduct',
  standalone: true,
  imports: [CommonModule, MaterialModule, FormsModule],
  templateUrl: './addeditproduct.component.html',
  styleUrl: './addeditproduct.component.css'
})
export class AddeditproductComponent implements OnInit{

  product!: Product;
  type : string = "clothes";
  constructor(
		public dialogRef: MatDialogRef<AddeditproductComponent>,
		@Inject(MAT_DIALOG_DATA) public data : any
	) {}

  ngOnInit(): void {
    if(this.data.addMode === true){
      const emptyProduct: Product = {
        id: 0,
        name: '',
        price: 0,
        url_image: '',
        description: ''
      };
      this.product = emptyProduct;
    }
    else{
      this.product = this.data.product;
    }
  }

  onNoClick(): void {
		this.dialogRef.close();
	}
	// confirm delete
	onYesClick(): void {
		this.dialogRef.close(this.product);
	}

}
