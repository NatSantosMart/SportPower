import { Routes } from '@angular/router';
import { HomeComponent } from './components/home/home.component';
import { LoginComponent } from './components/login/login.component';
import { ProductsListComponent } from './components/products-list/products-list.component';
import { ProductDetailsComponent } from './components/product-details/product-details.component';
import { ForoComponent } from './components/foro/foro.component';

export const routes: Routes = [
    {path: 'home', component : HomeComponent},
    {path: 'login', component : LoginComponent},
    {path: 'products/clothing/women', component : ProductsListComponent},
    {path: 'products/clothing/women/:id', component : ProductDetailsComponent},
    {path: 'foro', component : ForoComponent},
    {path: '', redirectTo: 'login', pathMatch: 'full'}
];
