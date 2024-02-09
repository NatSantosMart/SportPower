import { CommonModule } from '@angular/common';
import { Component, Inject, OnInit } from '@angular/core';
import { MaterialModule } from '../../../material.module';
import { MAT_DIALOG_DATA, MatDialogRef } from '@angular/material/dialog';
import { FormsModule } from '@angular/forms';
import { Product } from '../../../models/product.model';
import { Clothing } from '../../../models/clothing.model'
import { Supplement } from '../../../models/supplement.model'
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

  solicitud: any; 
  newProductId: any; 
  newProduct: any;
  newClothing!: any;
  newSupplement!: any;
  product: any; 
  type : any; 
  tipoProducto : any; 

  constructor(
    private _productService : ProductService,
    private _clothingService : ClothingService, 
    private _supplementService : SupplementService, 
		public dialogRef: MatDialogRef<AddeditproductComponent>,
		@Inject(MAT_DIALOG_DATA) public data : any
	) {
    this.newProduct = {
      name: '',
      price: '',
      description: '',
      url_image: '',
      type: ''
    };
    this.newSupplement = {
      quantity: '',
      product_id: 0,
      type: 'vitamina',
      flavor: ''
    };
    this.newClothing = {
      gender: 'Femenino',
      product_id: 0,
      size: 'S',
      color: '',
    };
  }

  ngOnInit(): void {
    if(this.data.addMode === true){

      this.tipoProducto = "clothes"; 
      //Añadir un nuevo producto
      this.assignEmptyProduct();
    }
    else{
      //Editar un producto 
      this.product = this.data.product;

    }
  }


  assignEmptyProduct(){

    if (this.tipoProducto === 'clothes') {
      const emptyClothing: Clothing = {
        id: 0,
        gender: 'Femenino',
        size: 'S',
        color: '',
        product_id: 0,
        product: {
            id: 0,
            name: '',
            price: 0,
            url_image: '',
            description: '', 
            type: 'ropa'
        }
    };
      this.product = emptyClothing;

    } else if (this.tipoProducto === 'supplementation') {
      const emptySupplement: Supplement = {
          product: {
              id: 0,
              name: '',
              price: 0,
              url_image: '',
              description: '',
              type: 'suplemento'
          },
          id: 0,
          product_id: 0,
          type: 'proteina',
          flavor: 'Fresa',
          quantity: '1kg'
      };
      this.product = emptySupplement;
    }
  }

  onNoClick(): void {
		this.dialogRef.close();
	}

	pressGuardar(): void {
		//this.dialogRef.close(this.product);


    console.log(this.product.product.url_image);

    this.newProduct.url_image = this.product.product.url_image; 
    this.newProduct.name = this.product.product.name; 
    this.newProduct.price = this.product.product.price; 
    this.newProduct.description = this.product.product.description; 
    this.newProduct.type = this.product.product.type; 

    this._productService.createProduct(this.newProduct).subscribe(
      (response) => {

        // Crear un nuevo post utilizando el ID del comentario
        this.newProductId = response.data.id;

        if (this.product.product.type === "ropa"){
          this.storeNewClothing(); 
        } else {
          this.storeNewSupplement();
        }
      },
      (error) => {
        console.error('Error creating comment:', error);
      }
    );

	}

  storeNewClothing (){

    this.newClothing.product_id = this.newProductId; 
    this.newClothing.color = this.product.color; 
    this.newClothing.gender = this.product.gender; 
    this.newClothing.size = this.product.size; 

    this._clothingService.createClothing(this.newClothing).subscribe(
      (postResponse) => {
        console.log('Clothing created successfully:', postResponse);
         this.dialogRef.close(true);
      },
      (postError) => {
        console.error('Error creating post:', postError);
      }
    );
  }
  
  storeNewSupplement (){
    
    this.newSupplement.product_id = this.newProductId; 
    this.newSupplement.flavor = this.product.flavor; 
    this.newSupplement.quantity = this.product.quantity; 
    this.newSupplement.type = this.product.type; 

    this._supplementService.createClothing(this.newSupplement).subscribe(
      (postResponse) => {
        console.log('Supplement created successfully:', postResponse);
         this.dialogRef.close(true);
      },
      (postError) => {
        console.error('Error creating post:', postError);
      }
    );
  }

}
