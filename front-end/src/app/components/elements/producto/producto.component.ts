import { Component, Input } from '@angular/core';
import { Product } from '../../../models/product.model';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-producto',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './producto.component.html',
  styleUrl: './producto.component.css'
})
export class ProductoComponent {
  @Input() producto: Product;
  @Input() eliminar: boolean = false;

  constructor() {
    this.producto = {} as Product;
  }

  eliminarProducto = () => {
    console.log('Eliminando producto');
  }
}
