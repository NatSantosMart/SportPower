import { Product } from "./product.model";

export class Clothing extends Product{
    constructor(
        id: number,
        name: string,
        price: number,
        url_image: string,
        description: string,
        public gender : string,
        public color : string,
        public size : string,
    ){super(id, name, price, url_image, description);}
}