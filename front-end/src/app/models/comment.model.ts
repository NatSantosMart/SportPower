export class Comment {
    constructor(
        public id : number,
        public date : Date,
        public url_image : String,
        public description : String,
        public client_dni : String,
        public client: any
    ){}
}