export class Client {
    constructor(
        public dni : string,
        public phone : number,
        public country : string,
        public postal_code : number, 
        public city : string, 
        public address : string, 
        public email : string, 
        public password : string, 
        public name : string, 
        public surnames : string, 
    ){}
}