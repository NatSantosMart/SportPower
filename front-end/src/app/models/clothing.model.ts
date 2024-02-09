import { Product } from "./product.model";

export interface Clothing{
    id : number;
    gender: "Femenino" | "Masculino" | "Unisex";
    size: "S" | "M" | "L" | "XL";
    color : string;
    product_id : number; 
    product: Product | null;
} 