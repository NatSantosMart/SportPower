import { Injectable } from "@angular/core";
import { HttpClient, HttpHeaders } from "@angular/common/http";
import { Observable } from "rxjs";
import { ApiConfig } from "./ApiConfig"; 
import { Product } from "../models/product.model";

@Injectable()
export class ProductService{

    constructor(
        private http: HttpClient
    ){}

    getAllProducts(): Observable<Product[]> {
        return this.http.get<Product[]>(`${ApiConfig.baseUrl}/products`);
    }
    
    getProductById(id : number) {
        return this.http.get(`${ApiConfig.baseUrl}/products/` + id);      
    }

    createProduct(newProduct: Product): Observable<any> {
        let params = JSON.stringify(newProduct); 
        let headersCreate = new HttpHeaders().set('Content-Type', 'application/json'); 
        return this.http.post(`${ApiConfig.baseUrl}/products`, params, {headers:headersCreate});
    }

    updateProduct(id:number, product: Product): Observable<any> {
        let params = JSON.stringify(product); 
        let headersCreate = new HttpHeaders().set('Content-Type', 'application/json'); 
        return this.http.post(`${ApiConfig.baseUrl}/products/` + id, params, {headers:headersCreate});
    }

    deleteProduct(product_id:number) {
        return this.http.delete(`${ApiConfig.baseUrl}/products/` + product_id);      
    }
}