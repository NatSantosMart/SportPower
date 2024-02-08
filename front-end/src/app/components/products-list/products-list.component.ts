import { Component, OnInit } from '@angular/core';
import { ToolbarComponent } from '../toolbar/toolbar.component';
import { Product } from '../../models/product.model';
import { ProductService } from '../../services/product.service';
import { ClothingService } from '../../services/clothing.service';
import { Router } from '@angular/router';
import { CommonModule } from '@angular/common';
import { FilterComponent } from '../filter/filter.component';
import { HttpClientModule } from '@angular/common/http'; 
import { Clothing } from '../../models/clothes.model';

@Component({
  selector: 'app-products-list',
  standalone: true,
  imports: [ToolbarComponent, CommonModule, FilterComponent, HttpClientModule],
  providers: [ProductService, ClothingService],
  templateUrl: './products-list.component.html',
  styleUrl: './products-list.component.css'
})
export class ProductsListComponent implements OnInit {
  
  constructor(private _productService : ProductService,
    private _clothingService : ClothingService, 
    private router : Router){}

    products: any[] = [];
    clothes: any[] = [];
    filteredProducts: any[] = [];
    allProducts: any[] = [];

  // ngOnInit() {
  //   // Al cargar la página, mostrar todos los productos por defecto
  //   this.products = this._clothingService.getAllClothes();
  //   this.allProducts = [...this.products];
  //   this.filteredProducts = this.allProducts;
  // }

  ngOnInit(): void {
    this._clothingService.getAllClothes().subscribe(
      (clothingData: any) => {

        this.allProducts  = clothingData.data;
        this.filteredProducts = this.allProducts;

        console.log(this.filteredProducts); 
      },
      (error: any) => {
        console.error(error);
      }
    );
  }

  updateFilters(selectedFilters: { type: string; values: string[] }[]) {
    if (selectedFilters.length === 0) {
      // Si no hay filtros seleccionados, mostrar todos los productos
      this.filteredProducts = [...this.allProducts];
    } else {
      // Si hay filtros seleccionados, filtrar productos en base a las opciones seleccionadas
      this.filteredProducts = this.allProducts.filter((product) => {
        return selectedFilters.every((filter) => {
          return this.filterProductByType(product, filter);
        });
      });
    }
  }

  filterProductByType(product: any, filter: { type: string; values: string[] }): boolean {
    // Lógica específica para cada tipo de filtro (size, color, etc.)
    if (filter.type === 'size') {
      return filter.values.length === 0 || filter.values.includes(product.size);
    } else if (filter.type === 'color') {
      return filter.values.length === 0 || filter.values.includes(product.color);
    }
    return true;
  }

  redirectToProductDetails(productId: number): void {
    console.log("productId: " + productId); 
    this.router.navigate(['/products/clothing/women', productId]);
  }
}
