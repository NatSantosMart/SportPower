import { Injectable } from "@angular/core";
import { HttpClient, HttpHeaderResponse, HttpHeaders } from "@angular/common/http";
import { Observable } from "rxjs";
import { ApiConfig } from "./ApiConfig"; 
import {Cart} from "../models/cart.model"; 

@Injectable()
export class CartService{

    constructor(
        private http: HttpClient
    ){}


    getProductsFromClient(dni : string) {
        return this.http.get(`${ApiConfig.baseUrl}/carts/from_client/` + dni);      
    }

    deleteProductToCart(dni : string, id: number) {
        return this.http.delete(`${ApiConfig.baseUrl}/carts/` + dni + '/' + id);      
    }
  
    storeProductToCart(cartObject: Cart): Observable<any> {
        let params = JSON.stringify(cartObject); 
        let headersCreate = new HttpHeaders().set('Content-Type', 'application/json'); 
        return this.http.post(`${ApiConfig.baseUrl}/carts`, params, {headers:headersCreate});
    }  

    updateQuantityProductsInCart(cartObject: Cart): Observable<any> {
        let params = JSON.stringify(cartObject); 
        let headersCreate = new HttpHeaders().set('Content-Type', 'application/json'); 
        return this.http.put(`${ApiConfig.baseUrl}/carts`, params, {headers:headersCreate});
    }  
}