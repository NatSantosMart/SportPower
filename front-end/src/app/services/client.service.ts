import { Injectable } from "@angular/core";
import { HttpClient } from "@angular/common/http";
import { Observable } from "rxjs";

@Injectable()
export class ClientService{

    constructor(
        private http: HttpClient
    ){}

    getAllClients(): Observable<any>{
        return this.http.get('http://localhost/api/clients');
    }

    getClientById(dni : string) {
        return this.http.get('http://localhost/api/clients/' + dni);
    }
}