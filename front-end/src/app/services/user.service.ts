import { Injectable } from "@angular/core";
import { User } from "../models/user.model";

@Injectable()
export class UserService{

    users: User [] = [
        { name: "Ana", lastname: "Regalado", email: "anarearregui@gmail.com", password: "1234" },
        { name: "Ander", lastname: "Gonzalez", email: "andergonzalez@gmail.com", password: "12345" },
        { name: "Judit", lastname: "Ibarguren", email: "juditibarguren@gmail.com", password: "123456" },
        { name: "a", lastname: "a", email: "a", password: "a" }
      ];

    getAll() : User []{
        return this.users;
    }

    add(user : User){
        
    }
}