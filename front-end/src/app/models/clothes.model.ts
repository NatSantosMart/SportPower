import { Product } from "./product.model";

export interface Clothing extends Product{
    id: number;
    name: string;
    price: number;
    url_image: string;
    description: string;
    gendre: string;
    color: string;
    size: string;
}