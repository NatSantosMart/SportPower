import { CommonModule } from '@angular/common';
import { Component, OnInit } from '@angular/core';
import { MaterialModule } from '../../material.module';
import { ProductService } from '../../services/product.service';
import { ClothingService } from '../../services/clothing.service';
import { ActivatedRoute, Router } from '@angular/router';
import { FormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http'; 
import { ToolbarComponent } from '../toolbar/toolbar.component';

@Component({
  selector: 'app-product-details',
  standalone: true,
  imports: [CommonModule, MaterialModule, FormsModule, ToolbarComponent, HttpClientModule],
  providers: [ProductService, ClothingService],
  templateUrl: './product-details.component.html',
  styleUrl: './product-details.component.css'
})
export class ProductDetailsComponent  implements OnInit{

  constructor(
    private _productService : ProductService,
    private _clothingService : ClothingService, 
    private router : Router,
    private route: ActivatedRoute){}

    clothing: any;
    productId! : any;

  ngOnInit(): void {

    this.productId = this.route.snapshot.paramMap.get('id');

    this._clothingService.getClothesByIdProduct(this.productId).subscribe(
      (clientData: any) => {
        console.log(clientData.data); 
        this.clothing = clientData.data;
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
