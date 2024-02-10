import { Injectable } from "@angular/core";
import { HttpClient, HttpHeaders } from "@angular/common/http";
import { Observable } from "rxjs";
import { ApiConfig } from "./ApiConfig"; 

@Injectable()
export class RatingService{

    constructor(
        private http: HttpClient
    ){}

    getRatingsFromProduct(id:number): Observable<any>{
        return this.http.get(`${ApiConfig.baseUrl}/ratings/from_product/` + id);
    }

    createRating(rating: Comment): Observable<any> {
        let params = JSON.stringify(rating); 
        let headersCreate = new HttpHeaders().set('Content-Type', 'application/json'); 
        return this.http.post(`${ApiConfig.baseUrl}/ratings`, params, {headers:headersCreate});
    }
}