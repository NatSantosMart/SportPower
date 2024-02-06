import { Injectable } from "@angular/core";
import { HttpClient } from "@angular/common/http";
import { Observable } from "rxjs";
import { ApiConfig } from "./ApiConfig"; 

@Injectable()
export class ClientService{

    constructor(
        private http: HttpClient
    ){}

    getAllClients(): Observable<any>{
        return this.http.get(`${ApiConfig.baseUrl}/clients`);
    }

    getClientById(dni : string) {
        return this.http.get(`${ApiConfig.baseUrl}/clients/` + dni);
    }

    createClient(clientData: any): Observable<any> {
        return this.http.post(`${ApiConfig.baseUrl}/clients`, clientData);
    }
}