import { Component, EventEmitter, Input, Output } from '@angular/core';
import { CommonModule } from '@angular/common';
import { Product } from '../../../models/product.model';
import { CartService } from '../../../services/cart.service';

@Component({
  selector: 'app-producto',
  standalone: true,
  imports: [CommonModule],
  providers: [CartService],
  templateUrl: './producto.component.html',
  styleUrl: './producto.component.css'
})
export class ProductoComponent {
  @Input() producto: Product = {} as Product;
  @Input() eliminar: boolean = false;
  @Output() productoEliminado = new EventEmitter<number>();

  constructor(
    private _cartService: CartService
  ) {}

  eliminarProducto = () => {
    if (this.producto && this.producto.id) {
      const currentUserString = localStorage.getItem('currentUser');
      const currentUser = currentUserString ? JSON.parse(currentUserString) : null;
      const dni = currentUser ? currentUser.dni : null;
      
      const productId = this.producto.id;

      this._cartService.deleteProductToCart(dni, productId).subscribe(
        () => {
          console.log('Producto eliminado del carrito');
          this.productoEliminado.emit(this.producto.id);
        },
        (error) => {
          console.error('Error al eliminar el producto del carrito:', error);
        }
      );
    } else {
      console.warn('No se puede eliminar el producto, falta la información necesaria.');
    }
  }
}
