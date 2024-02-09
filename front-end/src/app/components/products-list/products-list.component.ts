import { Component, OnInit } from '@angular/core';
import { ToolbarComponent } from '../toolbar/toolbar.component';
import { Product } from '../../models/product.model';
import { ProductService } from '../../services/product.service';
import { ClothingService } from '../../services/clothing.service';
import { SupplementService } from '../../services/supplements.service';
import { Router } from '@angular/router';
import { CommonModule } from '@angular/common';
import { FilterComponent } from '../filter/filter.component';
import { HttpClientModule } from '@angular/common/http'; 
import { Clothing } from '../../models/clothes.model';
import { ActivatedRoute } from '@angular/router';


@Component({
  selector: 'app-products-list',
  standalone: true,
  imports: [ToolbarComponent, CommonModule, FilterComponent, HttpClientModule],
  providers: [ProductService, ClothingService, SupplementService],
  templateUrl: './products-list.component.html',
  styleUrl: './products-list.component.css'
})
export class ProductsListComponent implements OnInit {
  
  constructor(private _productService : ProductService,
    private _clothingService : ClothingService, 
    private _supplementService : SupplementService, 
    private route: ActivatedRoute, 
    private router : Router){}

    typeAtribute: any; 
    typeProduct: any; //clothing o supplement
    supplementType: any; 
    gender: any; 
    products: any[] = [];
    clothes: any[] = [];
    filteredProducts: any[] = [];
    allProducts: any[] = [];

  ngOnInit(): void {
      const url = this.route.snapshot.url;
      this.typeAtribute = url[url.length - 1].path;
      this.typeProduct = url[url.length - 2].path;

      //Listado de clothes 
      if(this.typeProduct === 'clothing'){
        this.getListClothes(); 
      }
      //Listado de supplements 
      else {
        this.getListSupplements(); 
      }
  }


  getListClothes(){   
    if(this.typeAtribute === 'men'){
      this.gender = "Masculino"; 
    } else{
      this.gender = "Femenino"; 
    }
    //Obtiene toda la ropa del genero seleccionado
    this._clothingService.getAllClothesByGender(this.gender).subscribe(
      (clothingData: any) => {

        this.allProducts  = clothingData.data;
        this.filteredProducts = this.allProducts;
      },
      (error: any) => {console.error(error);}
    );
  }

  getListSupplements(){   
    if(this.typeAtribute === 'proteins'){
      this.supplementType = "Proteina"; 
    } 
    if(this.typeAtribute === 'vitamins'){
      this.supplementType = "Vitamina"; 
    } 
    if(this.typeAtribute === 'snacks'){
      this.supplementType = "Snack"; 
    } 

    //Obtiene todos los suplementos del tipo seleccionado (vitamina, snack o proteina)
    this._supplementService.getAllSupplementsByType(this.supplementType).subscribe(
      (supplementData: any) => {

        this.allProducts  = supplementData.data;
        this.filteredProducts = this.allProducts;
      },
      (error: any) => {console.error(error);}
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
    console.log(product); 


    //Filtros clothes
    if (filter.type === 'size') {
      return filter.values.length === 0 || filter.values.includes(product.size);
    } 
    if (filter.type === 'color') {
      return filter.values.length === 0 || filter.values.includes(product.color);
    }
    
    //Filtros supplements
    if (filter.type === 'flavor') {
      return filter.values.length === 0 || filter.values.includes(product.flavor);
    }
    return true;
  }

  redirectToProductDetails(productId: number): void {
    this.router.navigate(['/products/'+ this.typeProduct +'/'+ this.typeAtribute + '/' + productId]);
  }
  
}
