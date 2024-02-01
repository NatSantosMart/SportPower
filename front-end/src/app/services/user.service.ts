import { Injectable } from "@angular/core";
import { User } from "../models/user.model";

@Injectable()
export class UserService{

    users : User [] = [new User ("Ana", "Regalado", "anarearregui@gmail.com", "1234"),
    new User ("Ander", "Gonzalez", "andergonzalez@gmail.com", "12345"),
    new User ("Judit", "Ibarguren", "juditibarguren@gmail.com", "123456"),
    new User ("a", "a", "a", "a")]

    getAll() : User []{
        return this.users;
    }

    add(user : User){
        
    }
}