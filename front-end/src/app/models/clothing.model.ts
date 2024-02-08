import { Product } from "./product.model";

export interface Clothing extends Product{
    id : number;
    gender : string;
    size : string;
    color : string;
    product_id : number; 
    product: Product | null;
}