import { Injectable } from "@angular/core";
import { HttpClient } from "@angular/common/http";
import { Observable } from "rxjs";

@Injectable()
export class CommentService{

    constructor(
        private http: HttpClient
    ){}

    getAllComments(): Observable<any>{
        return this.http.get('http://localhost/api/comments');
    }

    getCommentById(id : number) {
        return this.http.get('http://localhost/api/comments/' + id);
    }
}