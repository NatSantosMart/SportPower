import { Component, OnInit } from '@angular/core';
import { ToolbarComponent } from '../toolbar/toolbar.component';
import { ProductService } from '../../../services/product.service';
import { ClothingService } from '../../../services/clothing.service';
import { SupplementService } from '../../../services/supplements.service';
import { Router } from '@angular/router';
import { CommonModule } from '@angular/common';
import { MaterialModule } from '../../../material.module';
import { HttpClientModule } from '@angular/common/http'; 
import { MatDialog } from '@angular/material/dialog';
import { DeletedialogComponent } from '../deletedialog/deletedialog.component';

import { Product } from '../../../models/product.model';
import { ConfirmationdialogComponent } from '../confirmationdialog/confirmationdialog.component';
import { AddeditproductComponent } from '../addeditproduct/addeditproduct.component';

@Component({
  selector: 'app-products-list',
  standalone: true,
  imports: [ToolbarComponent, CommonModule, MaterialModule, HttpClientModule],
  providers: [ProductService, ClothingService, SupplementService],
  templateUrl: './products-list.component.html',
  styleUrl: './products-list.component.css'
})
export class ProductsListAdminComponent implements OnInit {
  
  constructor(private _productService : ProductService,
    private _clothingService : ClothingService, 
    private _supplementService : SupplementService, 
    private router : Router,
    public dialog: MatDialog,
    ){}

    products: any[] = [];
    filteredProducts: any[] = [];
    allProducts: any[] = [];

  ngOnInit() {
        this.getListClothes(); 
        this.getListSupplements(); 

  }

  getListClothes(){   
    this._clothingService.getAllClothes().subscribe(
      (clothingData: any) => {

        this.products = this.products.concat(clothingData.data);
      },
      (error: any) => {console.error(error);}
    );
  }

  getListSupplements(){   
    this._supplementService.getAllSupplements().subscribe(
      (supplementData: any) => {

        this.products = this.products.concat(supplementData.data);
      },
      (error: any) => {console.error(error);}
    );
  }


  updateProduct(product: number) {
    const dialogRef = this.dialog.open(AddeditproductComponent,({
      data: {
        addMode : false,
        product : product
      }
    }));
    // Suponiendo que tienes una referencia al MatDialogRef llamada dialogRef
    dialogRef.afterClosed().subscribe((result) => {
      if (result) {
        const dialogRef = this.dialog.open(ConfirmationdialogComponent,{
          data: {
            satisfactory : true,
            editMode : true
          }       
        })
        setTimeout(() => { dialogRef.close(); }, 3000);
      } else {
        {
          const dialogRef = this.dialog.open(ConfirmationdialogComponent,{
            data: {
              editMode : false,
              satisfactory : false
            }         
          })
        }
        setTimeout(() => {dialogRef.close();}, 3000);
      }
    });
  }

  addProduct(){
    
    const dialogRef = this.dialog.open(AddeditproductComponent,({
      data: {
        addMode : true
      }
    }));

    // Suponiendo que tienes una referencia al MatDialogRef llamada dialogRef
    dialogRef.afterClosed().subscribe((result) => {
      if (result) {
        const dialogRef = this.dialog.open(ConfirmationdialogComponent,{
          data: {
            satisfactory : true,
            editMode : true
          }       
        })
        setTimeout(() => { dialogRef.close(); }, 3000);
      } else {
        {
          const dialogRef = this.dialog.open(ConfirmationdialogComponent,{
            data: {
              editMode : false,
              satisfactory : false
            }         
          })
        }
        setTimeout(() => {dialogRef.close();}, 3000);
      }
    });
  }

  deleteProduct(product: Product) {
   
    const dialogRef = this.dialog.open(DeletedialogComponent, {
      data: {
        product : product
      }
    });

    dialogRef.afterClosed().subscribe((result) => {
      if (result) {
        const dialogRef = this.dialog.open(ConfirmationdialogComponent,{
          data: {
            satisfactory : false,
            editMode : true
          }       
        })
        setTimeout(() => { dialogRef.close(); }, 3000);
      } else {
        {
          const dialogRef = this.dialog.open(ConfirmationdialogComponent,{
            data: {
              editMode : false,
              satisfactory : false
            }         
          })
        }
        setTimeout(() => {dialogRef.close();}, 3000);
      }
    });

}

}