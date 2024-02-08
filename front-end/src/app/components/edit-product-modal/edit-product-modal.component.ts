import { Component, Input } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { Product } from '../../models/product.model';
import { BrowserModule } from '@angular/platform-browser';
import { MatDialogModule } from '@angular/material/dialog';
import { Clothing } from '../../models/clothes.model';
import { ClothingService } from '../../services/clothing.service';
import { HttpResponse } from '@angular/common/http';

@Component({
  selector: 'app-edit-product-modal',
  standalone: true,
  imports: [FormsModule, MatDialogModule],
  providers: [ClothingService],
  templateUrl: './edit-product-modal.component.html',
  styleUrl: './edit-product-modal.component.css'
})
export class EditProductModalComponent {
  @Input() productoSeleccionado: Clothing;
  ClothingService: any;
  constructor() {
    this.productoSeleccionado = {} as Clothing;
  }
  confirmarEdicion = () => {
    this.ClothingService.updateClothing(this.productoSeleccionado).subscribe(
      (response: HttpResponse<Clothing>) => {
        console.log('Ropa actualizada correctamente', response);
        // Puedes emitir un evento o realizar otras acciones después de la actualización
      },
      (error: any) => {
        console.error('Error al actualizar la ropa', error);
      }
    );
  }
  cancelarEdicion = () => {}
}
