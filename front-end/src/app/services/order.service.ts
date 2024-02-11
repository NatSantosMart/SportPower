import { Injectable } from "@angular/core";
import { HttpClient, HttpHeaderResponse, HttpHeaders } from "@angular/common/http";
import { Observable } from "rxjs";
import { ApiConfig } from "./ApiConfig"; 
import { Order } from "../models/order.model"; 

@Injectable()
export class OrderService{

    constructor(
        private http: HttpClient
    ){}


    getOrdersFromClient(dni : string) {
        return this.http.get(`${ApiConfig.baseUrl}/orders/from_client/` + dni);      
    }

    deleteOrder(dni : string, id: number) {
        return this.http.delete(`${ApiConfig.baseUrl}/carts/` + dni + '/' + id);      
    }
  
    storeNewOrder(order: Order): Observable<any> {
        let params = JSON.stringify(order); 
        let headersCreate = new HttpHeaders().set('Content-Type', 'application/json'); 
        return this.http.post(`${ApiConfig.baseUrl}/orders`, params, {headers:headersCreate});
    }  

    updateQuantityProductsInCart(order: Order): Observable<any> {
        let params = JSON.stringify(order); 
        let headersCreate = new HttpHeaders().set('Content-Type', 'application/json'); 
        return this.http.put(`${ApiConfig.baseUrl}/orders`, params, {headers:headersCreate});
    }  
}