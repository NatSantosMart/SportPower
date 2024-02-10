import { CommonModule } from '@angular/common';
import { Component } from '@angular/core';
import { MaterialModule } from '../../../material.module';
import { Router } from '@angular/router';
import { AuthenticatorService } from '../../../services/authenticator.service';

@Component({
  selector: 'app-toolbarAdmin',
  standalone: true,
  imports: [CommonModule, MaterialModule],
  providers: [AuthenticatorService],
  templateUrl: './toolbar.component.html',
  styleUrl: './toolbar.component.css'
})
export class ToolbarComponentAdmin {

  constructor(private router: Router, 
    private _authenticatorService: AuthenticatorService) { }

  redirectToProducts(): void {
    this.router.navigate(['/products']);
  }
  redirectToForo(): void {
    this.router.navigate(['/foro']);
  }
  cerrarSesion(): void {
    this.router.navigate(['/login']);
    this._authenticatorService.logout(); 
  }

}
