import { Component } from '@angular/core';
import { UserService } from '../../services/user.service';
import { ClientService } from '../../services/client.service';
import { Client } from '../../models/client.model';
import { CommonModule } from '@angular/common';
import { MaterialModule } from '../../material.module';
import { FormsModule } from '@angular/forms';
import { Router } from '@angular/router';
import { HttpClientModule } from '@angular/common/http'; 

@Component({
  selector: 'app-login',
  standalone: true,
  imports: [CommonModule, MaterialModule, FormsModule, HttpClientModule],
  templateUrl: './login.component.html',
  styleUrl: './login.component.css',
  providers: [ClientService]
})
export class LoginComponent {
  constructor(
    private _clientService : ClientService,
    private router : Router
  ){}

  hide = true;
  email! : string;
  password! : string;
  clients: any[] = [];
  login! : boolean;
  repitedEmail! : string;
  name! : string;
  lastname! : string;
  wrongEmail! : boolean;
  errorMessage: string = '';

  ngOnInit(): void {
    this.login = true;
    this.wrongEmail = false;
  }

  public checkUser(): void {
    this._clientService.getAllClients().subscribe((response: any) => {
      const clientsData: Client[] = response.data; // Accede a la propiedad data del objeto de respuesta
      this.clients = clientsData; // Asigna los clientes obtenidos del Observable al array clients
      const exists = this.clients.find(client => client.email === this.email && client.password === this.password);
      if (exists) {
        this.router.navigate(['/home']);
      } else {
        this.errorMessage = 'Usuario no existe. Inténtelo de nuevo. '; 
      }
    });
  }
  

  public changeToSignUp(){
    this.login = false;
  }

  public changeToLogin(){
    this.login = true;
    this.wrongEmail = false;
  }

  public signup(): void {
    // if (this.email === this.repitedEmail) {
    //   this._clientService.createClient(
    //     new Client(this.name, this.lastname, this.email, this.password, 
    //       "", "", "", "", "", ""); 
    //   ).subscribe(() => {
    //     // Éxito al crear el cliente, puedes redirigir o mostrar un mensaje de confirmación
    //   }, error => {
    //     console.error('Error al crear el cliente:', error);
    //     // Manejar el error si es necesario
    //   });
    // } else {
    //   this.wrongEmail = true;
    // }
  }
}
