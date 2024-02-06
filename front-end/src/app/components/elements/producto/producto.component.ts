import { Component, Input } from '@angular/core';
import { Product } from '../../../models/product.model';

@Component({
  selector: 'app-producto',
  standalone: true,
  imports: [],
  templateUrl: './producto.component.html',
  styleUrl: './producto.component.css'
})
export class ProductoComponent {
  @Input() producto: Product;

  constructor() {
    this.producto = {} as Product;
  }
}
