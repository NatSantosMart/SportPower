import { Injectable } from "@angular/core";
import { HttpClient, HttpHeaderResponse, HttpHeaders } from "@angular/common/http";
import { Observable } from "rxjs";
import { ApiConfig } from "./ApiConfig"; 
import {Comment} from "../models/comment.model"; 

@Injectable()
export class CommentService{

    constructor(
        private http: HttpClient
    ){}

    getAllComments(): Observable<any>{
        return this.http.get(`${ApiConfig.baseUrl}/comments`);
    }

    getCommentById(id : number) {
        return this.http.get(`${ApiConfig.baseUrl}/comments/` + id);      
    }

    createComment(newComment: Comment): Observable<any> {
        let params = JSON.stringify(newComment); 
        let headersCreate = new HttpHeaders().set('Content-Type', 'application/json'); 
        return this.http.post(`${ApiConfig.baseUrl}/comments`, params, {headers:headersCreate});
    }
}