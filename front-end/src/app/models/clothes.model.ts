import { Product } from "./product.model";

export interface Clothes extends Product{
    id: number;
    name: string;
    price: number;
    url_image: string;
    description: string;
    gender: "Femenino" | "Masculino" | "Unisex";
    color: string;
    size: "S" | "M" | "L" | "XL";
}