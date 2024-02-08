export interface Product{
    id : number;
    name : string;
    price : number;
    color?: string;
    gendre?: "Masculino" | "Femenino" | "Unisex"
    size?: "S" | "M" | "L" | "XL";
    url_image?: string;
    description : string;
}