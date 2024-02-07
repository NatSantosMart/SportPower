import { Injectable } from '@angular/core';
import { Router } from '@angular/router';

@Injectable({
  providedIn: 'root'
})
export class AuthenticatorService {
  isLoggedIn = false;
  currentUser: any; // Variable para almacenar los datos del usuario autenticado

  constructor(private router: Router) {
    const storedUser = localStorage.getItem('currentUser');
    if (storedUser) {
      this.currentUser = JSON.parse(storedUser);
      this.isLoggedIn = true;
    }
  }

  public logIn(userData: any): void {
    console.log(userData); 
  }

  public logout(): void {
    localStorage.removeItem('currentUser');
    this.currentUser = null;
    this.isLoggedIn = false;
    this.router.navigate(['/login']);
  }
}
