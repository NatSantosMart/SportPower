import { Routes } from '@angular/router';
import { HomeComponent } from './components/home/home.component';
import { LoginComponent } from './components/login/login.component';
import { ProductsListComponent } from './components/products-list/products-list.component';
import { ProductDetailsComponent } from './components/product-details/product-details.component';
import { AssessmentComponent } from './components/assessment/assessment.component';

export const routes: Routes = [
    {path: 'home', component : HomeComponent},
    {path: 'login', component : LoginComponent},
    {path: 'products/clothing/women', component : ProductsListComponent},
    {path: 'products/clothing/women/:id', component : ProductDetailsComponent},
    {path: 'products/clothing/women/:id/assessment', component : AssessmentComponent},
    {path: '', redirectTo: 'login', pathMatch: 'full'}
];
