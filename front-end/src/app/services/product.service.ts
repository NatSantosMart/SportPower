import { Injectable } from "@angular/core";
import { Clothing } from "../models/clothes.model";
import { ApiConfig } from "./ApiConfig"; 

@Injectable()
export class ProductService{


    clothes : Clothing [] = [new Clothing(1,"Camiseta deportiva 1", 45, "../../../assets/imgs/61823BwBHaL.jpg", "Descripción producto 1", "Mujer", "Azul", "S"),
                             new Clothing(2, "Camiseta deportiva 2", 50, "../../../assets/imgs/1179300812_2_1_5.jpg", "Descripción producto 2", "Mujer", "Negro", "M"),
                             new Clothing(3, "Camiseta deportiva 3", 50, "../../../assets/imgs/3-2.jpg", "Descripción producto 3", "Mujer", "Negro", "S")]

    getAllClothes() : Clothing[]{
        return this.clothes;
    }

    getProductById(id : number) : Clothing | undefined {
        
        return this.clothes.find(clothing => clothing.id == id)
    }
}