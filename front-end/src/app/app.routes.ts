import { Routes } from '@angular/router';
import { HomeComponent } from './components/home/home.component';
import { LoginComponent } from './components/login/login.component';
import { ProductsListComponent } from './components/products-list/products-list.component';
import { ProductDetailsComponent } from './components/product-details/product-details.component';
import { AssessmentComponent } from './components/assessment/assessment.component';
import { ForoComponent } from './components/foro/foro.component';
// import { CarritoCompraComponent } from './components/carrito-compra/carrito-compra.component';
// import { ProductsListAdminComponent } from './components/admin/products-list/products-list.component';

export const routes: Routes = [
    {path: 'home', component : HomeComponent},
    {path: 'login', component : LoginComponent},
    
    {path: 'products/clothing/women', component : ProductsListComponent},
    {path: 'products/clothing/women/:id', component : ProductDetailsComponent},
    {path: 'products/clothing/women/:id/assessment', component : AssessmentComponent},

    {path: 'products/clothing/men', component : ProductsListComponent},
    {path: 'products/clothing/men/:id', component : ProductDetailsComponent},

    {path: 'products/supplement/vitamins', component : ProductsListComponent},
    {path: 'products/supplement/vitamins/:id', component : ProductDetailsComponent},

    {path: 'products/supplement/proteins', component : ProductsListComponent},
    {path: 'products/supplement/proteins/:id', component : ProductDetailsComponent},

    {path: 'products/supplement/snacks', component : ProductsListComponent},
    {path: 'products/supplement/snacks/:id', component : ProductDetailsComponent},
    
    {path: 'foro', component : ForoComponent},
    {path: '', redirectTo: 'login', pathMatch: 'full'}
    // {path: "carrito_compra", component: CarritoCompraComponent},
    // {path: "products", component : ProductsListAdminComponent}
];
