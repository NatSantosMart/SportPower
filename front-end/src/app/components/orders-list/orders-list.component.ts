import { Component } from '@angular/core';
import { ToolbarComponent } from '../toolbar/toolbar.component';
import { OrderService } from '../../services/order.service';
import { Order } from '../../models/order.model';

@Component({
  selector: 'app-orders-list',
  standalone: true,
  imports: [ToolbarComponent],
  providers: [OrderService],
  templateUrl: './orders-list.component.html',
  styleUrl: './orders-list.component.css'
})
export class OrdersListComponent {
  constructor(private _orderService: OrderService) { }
  orders: Order[] = [];

  ngOnInit(): void {
    const currentUserString = localStorage.getItem('currentUser');
    const currentUser = currentUserString ? JSON.parse(currentUserString) : null;
    const dni = currentUser ? currentUser.dni : null;

    if (dni) {
      this._orderService.getOrdersFromClient(dni).subscribe(
        (response: any) => {
          this.orders = response.data;
          console.log(response.data);
        },
        (error: any) => {
          console.log("Error al obtener las órdenes del cliente.");
        }
      );
    }
  }
}
