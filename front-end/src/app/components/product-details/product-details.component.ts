import { CommonModule } from '@angular/common';
import { Component, OnInit } from '@angular/core';
import { MaterialModule } from '../../material.module';
import { ProductService } from '../../services/product.service';
import { ClothingService } from '../../services/clothing.service';
import { CommentService } from '../../services/comment.service';
import { RatingService } from '../../services/rating.service';
import { SupplementService } from '../../services/supplements.service';
import { ActivatedRoute, Router } from '@angular/router';
import { FormsModule } from '@angular/forms';
import { ClientService } from '../../services/client.service';
import { HttpClientModule } from '@angular/common/http'; 
import { ToolbarComponent } from '../toolbar/toolbar.component';
import { CartService } from '../../services/cart.service';
import { DialogRatingComponent } from '../../dialog-rating/dialog-rating.component';
import {MatDialog, MatDialogModule} from '@angular/material/dialog';

@Component({
  selector: 'app-product-details',
  standalone: true,
  imports: [CommonModule, FormsModule, ToolbarComponent, HttpClientModule, DialogRatingComponent, MatDialogModule, MaterialModule],
  providers: [ProductService, ClientService, ClothingService, SupplementService, CartService, RatingService, CommentService],
  templateUrl: './product-details.component.html',
  styleUrl: './product-details.component.css'
})
export class ProductDetailsComponent  implements OnInit{

  constructor(
    private _productService : ProductService,
    private _commentsService: CommentService,
    private _clothingService : ClothingService, 
    private _supplementService : SupplementService, 
    private _cartService : CartService,
    private _clientsService: ClientService,
    private _ratingService : RatingService, 
    private router : Router,
    public dialog: MatDialog, 
    private route: ActivatedRoute){}

    ratings: any[] = [];
    typeProduct: any; 
    product: any;
    productId! : any;
    confirmationMessage: string = "";
    Math = Math;

  ngOnInit(): void {

    const url = this.route.snapshot.url;
    this.productId = this.route.snapshot.paramMap.get('id');
    this.typeProduct = url[url.length - 3].path;

    this.getRatingsFromProduct(); 

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

  //Obtiene todas las valoraciones de un producto
  private getRatingsFromProduct(): void {
    this._ratingService.getRatingsFromProduct(this.productId).subscribe(
      (ratingsData: any) => {
        this.ratings = ratingsData.data;
        console.log(this.ratings);
        this.getComment();
      },
      (error: any) => {
        console.error(error);
      }
    );
  }

  private getComment(): void {
    this.ratings.forEach(rating => {
      this._commentsService.getCommentById(rating.comment_id).subscribe(
        (commentData: any) => {
          rating.comment = commentData.data;
          this.getClientForComment(rating.comment);
        },
        (error: any) => {
          console.error(error);
        }
      );
    });
  }

  private getClientForComment(comment: any): void {
    this._clientsService.getClientById(comment.client_dni).subscribe(
      (clientData: any) => {
        comment.client = clientData.data;
      },
      (error: any) => {
        console.error(error);
      }
    );
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

  openDialog() {
    const dialogRef = this.dialog.open(DialogRatingComponent);

    dialogRef.afterClosed().subscribe(result => {
      console.log(`Dialog result: ${result}`);
      location.reload();
    });
  }

}
