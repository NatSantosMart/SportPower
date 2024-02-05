import { Injectable } from "@angular/core";
import { HttpClient } from "@angular/common/http";
import { Observable } from "rxjs";

@Injectable()
export class PostService{

    constructor(
        private http: HttpClient
    ){}

    getAllPosts(): Observable<any>{
        return this.http.get('http://localhost/api/posts');
    }
}