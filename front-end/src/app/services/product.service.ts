import { Injectable } from "@angular/core";
import { Clothing } from "../models/clothes.model";
import { Product } from "../models/product.model";

@Injectable()
export class ProductService{

    clothes: Clothing[] = [
        {
            id: 1,
            name: "Camiseta deportiva",
            price: 45,
            url_image: "../../../assets/imgs/61823BwBHaL.jpg",
            description: "Descripcion producto 1",
            gendre: "Mujer",
            color: "negro",
            size: "S"
        },
        {
            id: 2,
            name: "Camiseta deportiva",
            price: 50,
            url_image: "../../../assets/imgs/1179300812_2_1_5.jpg",
            description: "Descripcion producto 2",
            gendre: "Mujer",
            color: "negro",
            size: "M"  
        },
        {
            id: 3,
            name: "Camiseta deportiva",
            price: 55,
            url_image: "../../../assets/imgs/3-2.jpg",
            description: "Descripcion producto 3",
            gendre: "Mujer",
            color: "negro",
            size: "S"
        }
    ]                      

    getAllClothes() : Clothing[]{
        return this.clothes;
    }

    getProductById(id : number) : Clothing | undefined {
        
        return this.clothes.find(clothing => clothing.id == id)
    }

    deleteProduct(id : number) : boolean{
        console.log(id)
        return true;
    }

    addProduct(product : Product) : boolean{
        console.log(product)
        return true;
    }

    editProduct(product : Product) : boolean{
        console.log(product)
        return true;
    }
}