import { CommonModule } from '@angular/common';
import { Component } from '@angular/core';
import { UserService } from '../../services/user.service';
import { ProductService } from '../../services/product.service';
import { ProductoComponent } from '../elements/producto/producto.component';
import { MatIconModule } from '@angular/material/icon';
import { MatIconRegistry } from '@angular/material/icon';
import { DomSanitizer } from '@angular/platform-browser';
import { HttpClientModule } from '@angular/common/http';
import { ClothingService } from '../../services/clothing.service';
import { ToolbarComponent } from '../toolbar/toolbar.component';
import { CartService } from '../../services/cart.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-carrito-compra',
  standalone: true,
  imports: [CommonModule, ProductoComponent, MatIconModule, HttpClientModule, ToolbarComponent],
  providers: [UserService, ClothingService, CartService, ProductService],
  templateUrl: './carrito-compra.component.html',
  styleUrl: './carrito-compra.component.css'
})
export class CarritoCompraComponent {
  
  constructor(
   private router: Router,
   private _cartService: CartService,
   private _productsService: ProductService,
    private matIconRegistry: MatIconRegistry, private domSanitizer: DomSanitizer){
    this.matIconRegistry.addSvgIcon(
      'papelera',
      this.domSanitizer.bypassSecurityTrustResourceUrl('assets/icons/papelera.svg')
    );
  }
  mostrarModal: boolean = false;
  allProducts: any[] = [];
  allProductsID: any[] = [];
  precioTotal: number = 0;
  impuestos: number = 0;
  total: number = 0;

  ngOnInit(): void {
    const currentUserString = localStorage.getItem('currentUser');
    const currentUser = currentUserString ? JSON.parse(currentUserString) : null;
    const dni = currentUser ? currentUser.dni : null;
 
    if(dni){
      this._cartService.getProductsFromClient(dni).subscribe(
      (response: any) => {
        this.allProductsID = response.data.map((product: any) => product.product_id);
        if (this.allProductsID.length > 0) {
          this.getProductsById();
        } else {
          console.log("No hay productos en el carrito.");
        }
      },
      (error: any) => {
        console.error('Error al obtener los productos del carrito', error);
      }
    );
    }
  }

  getProductsById = async() => {
    for (const id of this.allProductsID) {
      try {
        const response: any = await this._productsService.getProductById(id).toPromise();
        this.allProducts.push(response.data);
      } catch (error) {
        console.error('Error al obtener los productos', error);
      }
    } 
    this.precioTotal = 0;
    this.allProducts.forEach(producto => {
      this.precioTotal += parseInt(producto.price);
    });

    this.impuestos = this.precioTotal * 0.16;
    this.total = this.precioTotal + this.impuestos + 5;

  }

  onProductoEliminado = (productId: number) => {
    console.log("HE entrado al evento de eliminar producto")
    const index = this.allProducts.findIndex(product => product.id === productId);
    if (index !== -1) {
      this.allProducts.splice(index, 1);
      this.actualizarTotal();
    }
  }

  actualizarTotal() {
    this.precioTotal = 0;
    this.allProducts.forEach(producto => {
      this.precioTotal += parseInt(producto.price);
    });

    this.impuestos = this.precioTotal * 0.16;
    this.total = this.precioTotal + this.impuestos + 5;
  }

  realizarCompra = () => {
    this.mostrarModal= true
    console.log('Realizando compra');
    console.log(this.mostrarModal)
  }

  cerrarModal = () => {
    this.mostrarModal = false;
    this.router.navigate(['/']);  
  }
}
