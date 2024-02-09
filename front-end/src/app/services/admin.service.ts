import { Injectable } from "@angular/core";
import { HttpClient } from "@angular/common/http";
import { Observable } from "rxjs";
import { ApiConfig } from "./ApiConfig"; 

@Injectable()
export class AdminService{

    constructor(
        private http: HttpClient
    ){}

    getAllAdmins(): Observable<any>{
        return this.http.get(`${ApiConfig.baseUrl}/admins`);
    }

    getAdminById(dni : string) {
        return this.http.get(`${ApiConfig.baseUrl}/admins/` + dni);
    }

}