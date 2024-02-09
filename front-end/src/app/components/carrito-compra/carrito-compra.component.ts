import { CommonModule } from '@angular/common';
import { Component } from '@angular/core';
import { Product } from '../../models/product.model';
import { UserService } from '../../services/user.service';
import { ProductService } from '../../services/product.service';
import { ProductoComponent } from '../elements/producto/producto.component';
import { MatIconModule } from '@angular/material/icon';
import { MatIconRegistry } from '@angular/material/icon';
import { DomSanitizer } from '@angular/platform-browser';
import { HttpClientModule } from '@angular/common/http';
import { ClothingService } from '../../services/clothing.service';
import { Clothes } from '../../models/clothes.model';
import { ToolbarComponent } from '../toolbar/toolbar.component';

@Component({
  selector: 'app-carrito-compra',
  standalone: true,
  imports: [CommonModule, ProductoComponent, MatIconModule, HttpClientModule, ToolbarComponent],
  providers: [UserService, ClothingService],
  templateUrl: './carrito-compra.component.html',
  styleUrl: './carrito-compra.component.css'
})
export class CarritoCompraComponent {
  productosCarrito : Clothes[] = []
  
  constructor(private _clothingService: ClothingService, private matIconRegistry: MatIconRegistry, private domSanitizer: DomSanitizer){
    this.matIconRegistry.addSvgIcon(
      'papelera',
      this.domSanitizer.bypassSecurityTrustResourceUrl('assets/icons/papelera.svg')
    );
  }

  allProducts: any[] = [];
  ngOnInit(): void {
    this._clothingService.getAllClothes().subscribe(
        (response: any) => {
          this.allProducts = response.data;
        },
        (error: any) => {
          console.error('Error al obtener la ropa', error);
        });
  }

   getPrecioTotal = () => {
    let precioTotal = 0;
    this.allProducts.forEach(producto => {
      precioTotal += parseInt(producto.product.price);
    });
    return precioTotal;
  }

  getImpuestos = () => {
    return this.getPrecioTotal() * 0.16;
  }

  getTotal = () => {
    return this.getPrecioTotal() + this.getImpuestos() + 5;
  }

  realizarCompra = () => {
    console.log('Realizando compra');
  }
}
