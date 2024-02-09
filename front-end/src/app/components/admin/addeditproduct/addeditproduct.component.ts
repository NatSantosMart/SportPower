import { CommonModule } from '@angular/common';
import { Component, Inject, OnInit } from '@angular/core';
import { MaterialModule } from '../../../material.module';
import { MAT_DIALOG_DATA, MatDialogRef } from '@angular/material/dialog';
import { FormsModule } from '@angular/forms';
import { Product } from '../../../models/product.model';
import { HttpClientModule } from '@angular/common/http'; 
import { ProductService } from '../../../services/product.service';
import { ClothingService } from '../../../services/clothing.service';
import { SupplementService } from '../../../services/supplements.service';

@Component({
  selector: 'app-addeditproduct',
  standalone: true,
  imports: [CommonModule, MaterialModule, FormsModule, HttpClientModule],
  providers: [ProductService, ClothingService, SupplementService],
  templateUrl: './addeditproduct.component.html',
  styleUrl: './addeditproduct.component.css'
})
export class AddeditproductComponent implements OnInit{

  product!: Product;
  type : string = "clothes";
  constructor(
    private _productService : ProductService,
    private _clothingService : ClothingService, 
    private _supplementService : SupplementService, 
		public dialogRef: MatDialogRef<AddeditproductComponent>,
		@Inject(MAT_DIALOG_DATA) public data : any
	) {}

  ngOnInit(): void {
    if(this.data.addMode === true){
      //Añadir un producto
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
      //Editar un producto 
      this.product = this.data.product;
    }
  }

  getClothingDetails (){
    this._clothingService.getClothesByIdProduct(this.productId).subscribe(
      (clothingData: any) => {
        this.product = clothingData.data;
      },
      (error: any) => {
        console.error(error);
      }
    );
  }

  getSupplementsDetails (){
    this._supplementService.getSupplementsByIdProduct(this.productId).subscribe(
      (supplementData: any) => {
        this.product = supplementData.data;

        console.log(this.product.quantity); 
        console.log(this.product.flavor); 
      },
      (error: any) => {
        console.error(error);
      }
    );
  }

  onNoClick(): void {
		this.dialogRef.close();
	}
	// confirm delete
	onYesClick(): void {
		this.dialogRef.close(this.product);
	}

}
