// import { Component, OnInit } from '@angular/core';
// import { ToolbarComponent } from '../toolbar/toolbar.component';
// import { ProductService } from '../../../services/product.service';
// import { Router } from '@angular/router';
// import { CommonModule } from '@angular/common';
// import { MaterialModule } from '../../../material.module';
// import { MatDialog } from '@angular/material/dialog';
// import { DeletedialogComponent } from '../deletedialog/deletedialog.component';

// import { Product } from '../../../models/product.model';
// import { ConfirmationdialogComponent } from '../confirmationdialog/confirmationdialog.component';
// import { AddeditproductComponent } from '../addeditproduct/addeditproduct.component';

// @Component({
//   selector: 'app-products-list',
//   standalone: true,
//   imports: [ToolbarComponent, CommonModule, MaterialModule],
//   providers: [ProductService],
//   templateUrl: './products-list.component.html',
//   styleUrl: './products-list.component.css'
// })
// export class ProductsListAdminComponent implements OnInit {
  
//   constructor(private _productService : ProductService,
//     private router : Router,
//     public dialog: MatDialog,
//     ){}

//     products: any[] = [];
//     filteredProducts: any[] = [];
//     allProducts: any[] = [];

//   ngOnInit() {
//     // Al cargar la página, mostrar todos los productos por defecto
//     this.products = this._productService.getAllClothes();

//   }

//   editProduct(product: number) {
//     const dialogRef = this.dialog.open(AddeditproductComponent,({
//       data: {
//         addMode : false,
//         product : product
//       }
//     }));

//     dialogRef.afterClosed().subscribe(product => {
//       if (product) {
//         const status = this._productService.editProduct(product)
//         if(status){
//           const dialogRef = this.dialog.open(ConfirmationdialogComponent,{
//             data: {
//               satisfactory : true,
//               editMode : true
//             }
           
//           })

//           setTimeout(() => {
//             dialogRef.close();
//           }, 3000);
//         }
//         else{
//           const dialogRef = this.dialog.open(ConfirmationdialogComponent,{
//             data: {
//               editMode : false,
//               satisfactory : false
//             }
           
//           })
//         }
//         setTimeout(() => {
//           dialogRef.close();
//         }, 3000);
//       }
//     });
//   }

//   addProduct(){
    
//     const dialogRef = this.dialog.open(AddeditproductComponent,({
//       data: {
//         addMode : true
//       }
//     }));

//     dialogRef.afterClosed().subscribe(product => {
//       if (product) {
//         const status = this._productService.addProduct(product)
//         if(status){
//           const dialogRef = this.dialog.open(ConfirmationdialogComponent,{
//             data: {
//               satisfactory : true,
//               addMode : true
//             }
           
//           })

//           setTimeout(() => {
//             dialogRef.close();
//           }, 3000);
//         }
//         else{
//           const dialogRef = this.dialog.open(ConfirmationdialogComponent,{
//             data: {
//               addMode : true,
//               satisfactory : false
//             }
           
//           })
//         }
//         setTimeout(() => {
//           dialogRef.close();
//         }, 3000);
//       }
//     });
//   }

//   deleteProduct(product: Product) {
   
//     const dialogRef = this.dialog.open(DeletedialogComponent, {
//       data: {
//         product : product
//       }
//     });

//     dialogRef.afterClosed().subscribe(result => {
//       if (result) {
//         const status = this._productService.deleteProduct(product.id)
//         if(status){
//           const dialogRef = this.dialog.open(ConfirmationdialogComponent,{
//             data: {
//               editMode : false,
//               satisfactory : true
//             }
           
//           })

//           setTimeout(() => {
//             dialogRef.close();
//           }, 3000);
//         }
//         else{
//           const dialogRef = this.dialog.open(ConfirmationdialogComponent,{
//             data: {
//               editMode : false,
//               satisfactory : false
//             }
           
//           })
//         }
//         setTimeout(() => {
//           dialogRef.close();
//         }, 3000);
//       }
//     });
//   }
// }
