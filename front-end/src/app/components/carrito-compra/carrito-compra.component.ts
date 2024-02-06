import { CommonModule } from '@angular/common';
import { Component } from '@angular/core';
import { Product } from '../../models/product.model';
import { UserService } from '../../services/user.service';
import { ProductService } from '../../services/product.service';
import { ProductoComponent } from '../elements/producto/producto.component';

@Component({
  selector: 'app-carrito-compra',
  standalone: true,
  imports: [CommonModule, ProductoComponent],
  providers: [UserService, ProductService],
  templateUrl: './carrito-compra.component.html',
  styleUrl: './carrito-compra.component.css'
})
export class CarritoCompraComponent {
  productosCarrito : Product[] = []
  ProductService: any;
  
  constructor(private productService: ProductService){}
  ngOnInit(): void {

    this.productosCarrito = this.productService.getAllClothes();
  }

   getPrecioTotal = () => {
    let precioTotal = 0;
    this.productosCarrito.forEach(producto => {
      precioTotal += producto.price;
    });
    return precioTotal;
  }

  getImpuestos = () => {
    return this.getPrecioTotal() * 0.16;
  }

  getTotal = () => {
    return this.getPrecioTotal() + this.getImpuestos() + 5;
  }
}
