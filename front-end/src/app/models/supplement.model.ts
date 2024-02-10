import { Product } from "./product.model";

export interface Supplement {
    id : number;
    quantity : string;
    product_id : number;
    product?: Product | null; 
    type: string; 
    flavor: string; 
}