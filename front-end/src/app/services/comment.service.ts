import { Injectable } from "@angular/core";
import { HttpClient } from "@angular/common/http";
import { Observable } from "rxjs";
import { ApiConfig } from "./ApiConfig"; 

@Injectable()
export class CommentService{

    constructor(
        private http: HttpClient
    ){}

    getAllComments(): Observable<any>{
        return this.http.get(`${ApiConfig.baseUrl}/comments`);
    }

    getCommentById(id : number) {
        return this.http.get(`${ApiConfig.baseUrl}/comments` + id);
        
    }
}