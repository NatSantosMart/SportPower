import { Component, Input } from '@angular/core';
import { Order } from '../../models/order.model';
import { OrderProductService } from '../../services/orderProducts.service';
import { ProductService } from '../../services/product.service';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-order-product',
  standalone: true,
  imports: [CommonModule],
  providers: [OrderProductService, ProductService],
  templateUrl: './order-product.component.html',
  styleUrl: './order-product.component.css'
})
export class OrderProductComponent {
  
  @Input() orderProduct: Order = {} as Order;
  productsId: any[] = []; 
  products: any[] = [];
  constructor(
    private _orderProductService: OrderProductService,
    private _productsService: ProductService
  ) {  
  }

  ngOnInit(): void {
    this.getProductsFromOrder();
  }

  getProductsFromOrder = () => {
    if (this.orderProduct && this.orderProduct.id) {
      const order_id = this.orderProduct.id;
      this._orderProductService.getProductsFromOrder(order_id).subscribe(
        (response: any) => {
          console.log("getProductsFromOrder:",response.data);
          this.getProductData(response.data);
        },
        (error) => {
          console.error('Error al obtener los productos de la orden:', error);
        }
      );
    } else {
      console.warn('No se puede obtener los productos de la orden, falta la información necesaria.');
    }
  }

  getProductData = async(prodsOrder: any) => {
    prodsOrder.forEach((prodOrder: any) => {
      this.productsId.push(prodOrder.product_id);
    })
    console.log(this.productsId);
    this.getData()
  }

  getData = async()=>{
    console.log("IDs",this.productsId)
   
    for (const id of this.productsId) {
      try {
        const response: any = await this._productsService.getProductById(id).toPromise();
        this.products.push(response.data);
      } catch (error) {
        console.error('Error al obtener los productos', error);
      }
    } 
        console.log("PRoducts",this.products)
    
  }
}

