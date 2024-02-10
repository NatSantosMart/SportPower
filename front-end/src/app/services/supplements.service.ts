import { Injectable } from "@angular/core";
import { HttpClient, HttpHeaders } from "@angular/common/http";
import { Observable } from "rxjs";
import { ApiConfig } from "./ApiConfig"; 
import { Supplement } from "../models/supplement.model";

@Injectable()
export class SupplementService{

    
    constructor(
        private http: HttpClient
    ){}

    getAllSupplements(): Observable<any>{
        return this.http.get(`${ApiConfig.baseUrl}/supplements`);
    }

    getAllSupplementsByType(type : string): Observable<any>{
        return this.http.get(`${ApiConfig.baseUrl}/supplements/` + type);
    }

    getSupplementsByIdProduct(id : number) {
        return this.http.get(`${ApiConfig.baseUrl}/supplements/from_product/` + id);      
    }

    createClothing(newProduct: Supplement): Observable<any> {
        let params = JSON.stringify(newProduct); 
        let headersCreate = new HttpHeaders().set('Content-Type', 'application/json'); 
        return this.http.post(`${ApiConfig.baseUrl}/supplements`, params, {headers:headersCreate});
    }

    updateSupplement(id:number, supplement: Supplement): Observable<any> {
        let params = JSON.stringify(supplement); 
        let headersUpdate = new HttpHeaders().set('Content-Type', 'application/json'); 
        return this.http.post(`${ApiConfig.baseUrl}/supplements/` + id, params, {headers: headersUpdate});
   }

   
   deleteSupplement(product_id:number) {
    return this.http.delete(`${ApiConfig.baseUrl}/supplements/` + product_id);      
}
}