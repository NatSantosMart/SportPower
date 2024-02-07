import { Component, Input } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { Product } from '../../models/product.model';
import { BrowserModule } from '@angular/platform-browser';
import { MatDialogModule } from '@angular/material/dialog';

@Component({
  selector: 'app-edit-product-modal',
  standalone: true,
  imports: [FormsModule, MatDialogModule],
  templateUrl: './edit-product-modal.component.html',
  styleUrl: './edit-product-modal.component.css'
})
export class EditProductModalComponent {
  @Input() productoSeleccionado: Product;
  constructor() {
    this.productoSeleccionado = {} as Product;
  }
  confirmarEdicion = () => {}
  cancelarEdicion = () => {}
}
