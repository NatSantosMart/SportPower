import { Injectable } from "@angular/core";
import { HttpClient, HttpHeaderResponse, HttpHeaders } from "@angular/common/http";
import { Observable } from "rxjs";
import { ApiConfig } from "./ApiConfig"; 
import { Order } from "../models/order.model"; 
import { Product } from "../models/product.model";

@Injectable()
export class OrderProductService{

    constructor(
        private http: HttpClient
    ){}


    getProductsFromOrder(order_id : string) {
        return this.http.get(`${ApiConfig.baseUrl}/order_products/from_order/` + order_id);      
    }

  
    storeProductsToOrder(order_id: number, product_id: any[]): Observable<any> {
        const body = {
            order_id: order_id,
            product_id: product_id
          };

        let headersCreate = new HttpHeaders().set('Content-Type', 'application/json'); 
        return this.http.post(`${ApiConfig.baseUrl}/order_products`, body, {headers:headersCreate});
    }  

    

}