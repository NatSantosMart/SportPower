import { Injectable } from "@angular/core";
import { HttpClient, HttpHeaders } from "@angular/common/http";
import { Observable } from "rxjs";
import { ApiConfig } from "./ApiConfig"; 
import { Clothing } from "../models/clothing.model";

@Injectable()
export class ClothingService{

    
    constructor(
        private http: HttpClient
    ){}

    getAllClothes(): Observable<any>{
        console.log("URL: ",ApiConfig.baseUrl)
        return this.http.get(`${ApiConfig.baseUrl}/clothes`);
    }

    getAllClothesByGender(gender : string): Observable<any>{
        return this.http.get(`${ApiConfig.baseUrl}/clothes/` + gender);
    }

    //Se obteiene una ropa desde su proppio id
    getClothesById(id : number) {
        return this.http.get(`${ApiConfig.baseUrl}/clothes/` + id);      
    }
    //Se obtiene una ropa desde el id de un producto
    getClothesByIdProduct(id : number) {
        return this.http.get(`${ApiConfig.baseUrl}/clothes/from_product/` + id);      
    }

    createClothing(newProduct: Clothing): Observable<any> {
        let params = JSON.stringify(newProduct); 
        let headersCreate = new HttpHeaders().set('Content-Type', 'application/json'); 
        return this.http.post(`${ApiConfig.baseUrl}/clothes`, params, {headers:headersCreate});
    }

    updateClothing(id:number, clothing: Clothing): Observable<any> {
        let params = JSON.stringify(clothing); 
        let headersUpdate = new HttpHeaders().set('Content-Type', 'application/json'); 
        return this.http.post(`${ApiConfig.baseUrl}/clothes/` + id, params, {headers: headersUpdate});
   }

   deleteClothing(product_id:number) {
        return this.http.delete(`${ApiConfig.baseUrl}/clothes/` + product_id);      
    }
}