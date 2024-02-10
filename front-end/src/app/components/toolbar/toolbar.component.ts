import { CommonModule } from '@angular/common';
import { Component } from '@angular/core';
import { MaterialModule } from '../../material.module';
import { Router } from '@angular/router';
import { AuthenticatorService } from '../../services/authenticator.service';


@Component({
  selector: 'app-toolbar',
  standalone: true,
  imports: [CommonModule, MaterialModule],
  providers: [AuthenticatorService],
  templateUrl: './toolbar.component.html',
  styleUrl: './toolbar.component.css'
})
export class ToolbarComponent {

  constructor(private router: Router, 
    private _authenticatorService: AuthenticatorService) { }

  redirectToClothingList(gender : string): void {
    this.router.navigate(['/products/clothing/' + gender]);
  }

  redirectToSupplementList(type : string): void {
    this.router.navigate(['/products/supplement/' + type]);
  }

  redirectToForo(): void {
    this.router.navigate(['/foro']);
  }
  redirectToHome(): void {
    this.router.navigate(['/home']);
  }

  redirectToCarritoCompra(): void {
    this.router.navigate(['/carrito_compra']);
  }
  cerrarSesion(): void {
    this.router.navigate(['/login']);
    this._authenticatorService.logout(); 
  }

}
