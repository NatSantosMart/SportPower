import { Component, Input } from '@angular/core';
import { CommonModule } from '@angular/common';
import { Product } from '../../../models/product.model';

@Component({
  selector: 'app-producto',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './producto.component.html',
  styleUrl: './producto.component.css'
})
export class ProductoComponent {
  @Input() producto: Product = {} as Product;
  @Input() eliminar: boolean = false;

  constructor() {
    //this.producto = {} as Product;
    console.log("Producto",this.producto);
  }

  eliminarProducto = () => {
    console.log('Eliminando producto');
  }
}
