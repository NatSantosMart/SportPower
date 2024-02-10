import { CommonModule } from '@angular/common';
import { Component, OnInit } from '@angular/core';
import { MaterialModule } from '../../material.module';
import { ProductService } from '../../services/product.service';
import { ClothingService } from '../../services/clothing.service';
import { SupplementService } from '../../services/supplements.service';
import { ActivatedRoute, Router } from '@angular/router';
import { FormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http'; 
import { ToolbarComponent } from '../toolbar/toolbar.component';
import { CartService } from '../../services/cart.service';

@Component({
  selector: 'app-product-details',
  standalone: true,
  imports: [CommonModule, MaterialModule, FormsModule, ToolbarComponent, HttpClientModule],
  providers: [ProductService, ClothingService, SupplementService, CartService],
  templateUrl: './product-details.component.html',
  styleUrl: './product-details.component.css'
})
export class ProductDetailsComponent  implements OnInit{

  constructor(
    private _productService : ProductService,
    private _clothingService : ClothingService, 
    private _supplementService : SupplementService, 
    private _cartService : CartService,
    private router : Router,
    private route: ActivatedRoute){}

    typeProduct: any; 
    product: any;
    productId! : any;
    confirmationMessage: string = "";

  ngOnInit(): void {

    const url = this.route.snapshot.url;
    this.productId = this.route.snapshot.paramMap.get('id');
    this.typeProduct = url[url.length - 3].path;

      //Listado de clothes 
      if(this.typeProduct === 'clothing'){
        this.getClothingDetails(); 
      }
      //Listado de supplements 
      else {
        console.log('TypeProduct:' + this.typeProduct);
        this.getSupplementsDetails(); 
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

  addProductToCart(){
    const currentUserString = localStorage.getItem('currentUser');
    const currentUser = currentUserString ? JSON.parse(currentUserString) : null;
    const dni = currentUser ? currentUser.dni : null;
    const cartObject = {
      client_dni: dni,
      product_id: this.productId,
    }

    this._cartService.storeProductToCart(cartObject).subscribe(
      (response: any) => {
        this.confirmationMessage = "Producto añadido al carrito";
        console.log(response);
      },
      (error: any) => {
        console.error(error);
      }
    );
  }

  public addAssessment(){
    this.router.navigate(['/products/clothing/women', this.productId, 'assessment']);
  }
}
