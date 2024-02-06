import { CommonModule } from '@angular/common';
import { Component } from '@angular/core';
import { Product } from '../../models/product.model';
import { UserService } from '../../services/user.service';
import { ProductoComponent } from '../elements/producto/producto.component';

@Component({
  selector: 'app-carrito-compra',
  standalone: true,
  imports: [CommonModule, ProductoComponent],
  providers: [UserService],
  templateUrl: './carrito-compra.component.html',
  styleUrl: './carrito-compra.component.css'
})
export class CarritoCompraComponent {
  productosCarrito : Product[] = []
  
  constructor(private userService: UserService){}
  ngOnInit(): void {
    //this.productosCarrito = this.userService.getProductSelected();
  }
}
