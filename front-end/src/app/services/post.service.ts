import { Injectable } from "@angular/core";
import { HttpClient, HttpHeaders } from "@angular/common/http";
import { Observable } from "rxjs";
import { ApiConfig } from "./ApiConfig"; 

@Injectable()
export class PostService{

    constructor(
        private http: HttpClient
    ){}

    getAllPosts(): Observable<any>{
        return this.http.get(`${ApiConfig.baseUrl}/posts`);
    }

    createPost(newPost: Comment): Observable<any> {
        let params = JSON.stringify(newPost); 
        let headersCreate = new HttpHeaders().set('Content-Type', 'application/json'); 
        return this.http.post(`${ApiConfig.baseUrl}/posts`, params, {headers:headersCreate});
    }
}