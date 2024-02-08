import { Injectable } from "@angular/core";
import { HttpClient, HttpHeaders } from "@angular/common/http";
import { Observable } from "rxjs";
import { ApiConfig } from "./ApiConfig"; 
import { Clothing } from "../models/clothes.model";
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

    // clothes: Clothing[] = [
    //     {
    //         id: 1,
    //         name: "Camiseta deportiva",
    //         price: 45,
    //         url_image: "../../../assets/imgs/61823BwBHaL.jpg",
    //         description: "Descripcion producto 1",
    //         gendre: "Femenino",
    //         color: "negro",
    //         size: "S"
    //     },
    //     {
    //         id: 2,
    //         name: "Camiseta deportiva",
    //         price: 50,
    //         url_image: "../../../assets/imgs/1179300812_2_1_5.jpg",
    //         description: "Descripcion producto 2",
    //         gendre: "Femenino",
    //         color: "negro",
    //         size: "M"  
    //     },
    //     {
    //         id: 3,
    //         name: "Camiseta deportiva",
    //         price: 55,
    //         url_image: "../../../assets/imgs/3-2.jpg",
    //         description: "Descripcion producto 3",
    //         gendre: "Femenino",
    //         color: "negro",
    //         size: "S"
    //     }
    // ]                      

    // getAllClothes() : Clothing[]{
    //     return this.clothes;
    // }

    // getProductById(id : number) : Clothing | undefined {
        
    //     return this.clothes.find(clothing => clothing.id == id)
    // }

    // deleteProduct(id : number) : boolean{
    //     console.log(id)
    //     return true;
    // }

    // addProduct(product : Product) : boolean{
    //     console.log(product)
    //     return true;
    // }

    // editProduct(product : Product) : boolean{
    //     console.log(product)
    //     return true;
    // }
}