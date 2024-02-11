import { Component } from '@angular/core';
import { UserService } from '../../services/user.service';
import { ClientService } from '../../services/client.service';
import { AdminService } from '../../services/admin.service';
import { Client } from '../../models/client.model';
import { CommonModule } from '@angular/common';
import { MaterialModule } from '../../material.module';
import { FormsModule } from '@angular/forms';
import { Router } from '@angular/router';
import { HttpClientModule } from '@angular/common/http'; 
import { AuthenticatorService } from '../../services/authenticator.service';
import { MatDialog } from '@angular/material/dialog';

import { ConfirmationdialogComponent } from '../../../app/components/admin/confirmationdialog/confirmationdialog.component';
import { AddeditproductComponent } from '../../../app/components/admin/addeditproduct/addeditproduct.component'; 

@Component({
  selector: 'app-login',
  standalone: true,
  imports: [CommonModule, MaterialModule, FormsModule, HttpClientModule],
  templateUrl: './login.component.html',
  styleUrl: './login.component.css',
  providers: [ClientService, AdminService, AuthenticatorService]
})
export class LoginComponent {
  constructor(
    private _clientService: ClientService,
    private _adminService: AdminService,
    private _authenticatorService: AuthenticatorService,
    public dialog: MatDialog,
    private router: Router
  ) {
    this.newClient = {
      dni: '',
      phone: '',
      city: '',
      address: '',
      email: '',
      password: '',
      name: '',
      surnames: '',
    };
  }

  hide = true;
  email! : string;
  password! : string;
  clients: any[] = [];
  admins: any[] = [];
  login! : boolean;
  repitedEmail! : string;
  name! : string;
  lastname! : string;
  city! : string;
  country! : string;
  dni! : string;
  phone! : number;
  address! : string;
  wrongEmail! : boolean;
  errorMessage: string = '';
  isLoggedIn = false;
  currentUser: any;
  newClient: any; 

  ngOnInit(): void {
    this.login = true;
    this.wrongEmail = false;
  }

  //Inicio sesión
  public loginUser(): void {
    //Comprobar si es cliente
    this._clientService.getAllClients().subscribe((response: any) => {
      const clientsData: Client[] = response.data; 
      this.clients = clientsData; 
      const exists = this.clients.find(client => client.email === this.email && client.password === this.password);

      if (exists) {
        this._authenticatorService.logIn(exists); 
        this.router.navigate(['/home']);
      } else {
        //Comprobar si es admin
        this.checkAdmin(); 
      }
    });
  }

    //Inicio sesión
  public checkAdmin(): void {
    this._adminService.getAllAdmins().subscribe((response: any) => {
      const adminsData: Client[] = response.data; 
      this.admins = adminsData; 
      const exists = this.admins.find(admin => admin.email === this.email && admin.password === this.password);

      if (exists) {
        this._authenticatorService.logIn(exists); 
        this.router.navigate(['/products']);
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

  public logout(): void {
    localStorage.removeItem('currentUser');
    this.isLoggedIn = false;
    this.router.navigate(['/login']);
  }

  //Registro
  public signUp(): void {

    this.newClient.dni = this.dni; 
    this.newClient.phone = this.phone; 
    this.newClient.email = this.email; 
    this.newClient.name = this.name; 
    this.newClient.surnames = this.lastname; 
    this.newClient.city = this.city; 
    this.newClient.address = this.address; 
    this.newClient.password = this.password; 
  

    this._clientService.createClient(this.newClient).subscribe(
      (response) => {
          this.dialogConfirm(); 
      },
      (error) => {
        this.dialogError(); 
        console.error('Error creating comment:', error);
      }
    );
  }


  dialogConfirm (){ 
    const dialogRef = this.dialog.open(ConfirmationdialogComponent,{
      data: {
        satisfactory : true,
        addClient : true
      }       
    })
    setTimeout(() => { 
      dialogRef.close(); 
      this.changeToSignUp(); 
      location.reload();
    }, 3000); 
  }

  dialogError(){ 
    const dialogRef = this.dialog.open(ConfirmationdialogComponent,{
      data: {
        satisfactory : false,
        addClient : true
      }       
    })
    setTimeout(() => { 
      dialogRef.close(); 
    }, 3000); 
  }
  
}