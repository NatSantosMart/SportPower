import { Component } from '@angular/core';
import { UserService } from '../../services/user.service';
import { User } from '../../models/user.model';
import { CommonModule } from '@angular/common';
import { MaterialModule } from '../../material.module';
import { FormsModule } from '@angular/forms';
import { Router } from '@angular/router';

@Component({
  selector: 'app-login',
  standalone: true,
  imports: [CommonModule, MaterialModule, FormsModule],
  templateUrl: './login.component.html',
  styleUrl: './login.component.css',
  providers: [UserService]
})
export class LoginComponent {
  constructor(
    private _userService : UserService,
    private router : Router
  ){}

  email! : string;
  password! : string;
  users! : User [];
  login! : boolean;
  repitedEmail! : string;
  name! : string;
  lastname! : string;
  wrongEmail! : boolean;

  ngOnInit(): void {
    this.login = true;
    this.wrongEmail = false;
  }

  public checkUser(){
    this.users = this._userService.getAll();
    const exists = this.users.find(u => u.email === this.email && u.password === this.password);
    if(exists){
      this.router.navigate(['/home'])
    }
    else{
    }
  }

  public changeToSignUp(){
    this.login = false;
  }

  public changeToLogin(){
    this.login = true;
    this.wrongEmail = false;
  }

  public signup(){
    if(this.email === this.repitedEmail){
      this._userService.add(new User(this.name, this.lastname, this.email, this.password))
    }
    else{
      this.wrongEmail = true;
    }
    
  }

}
