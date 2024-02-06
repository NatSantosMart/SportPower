import { CommonModule } from '@angular/common';
import { Component, OnInit } from '@angular/core';
import { MaterialModule } from '../../material.module';
import { ProductService } from '../../services/product.service';
import { ActivatedRoute, Router } from '@angular/router';
import { FormsModule } from '@angular/forms';
import { ToolbarComponent } from '../toolbar/toolbar.component';

@Component({
  selector: 'app-product-details',
  standalone: true,
  imports: [CommonModule, MaterialModule, FormsModule, ToolbarComponent],
  providers: [ProductService],
  templateUrl: './product-details.component.html',
  styleUrl: './product-details.component.css'
})
export class ProductDetailsComponent  implements OnInit{

  constructor(
    private _productService : ProductService,
    private router : Router,
    private route: ActivatedRoute){}

    product: any;
    productId! : any;

  ngOnInit(): void {

    this.productId = this.route.snapshot.paramMap.get('id');
    this.product = this._productService.getProductById(this.productId)
  }

  public addAssessment(){
    this.router.navigate(['/products/clothing/women', this.productId, 'assessment']);
  }
}
