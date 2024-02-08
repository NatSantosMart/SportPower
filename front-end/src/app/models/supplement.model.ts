import { Product } from "./product.model";

export interface Supplement extends Product{
    id : number;
    quantity : number;
    product_id : number;
}