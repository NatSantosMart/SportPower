export class Post {
    constructor(
        public comment_id : number,
        public type : string,
        public comment: Comment | null = null
    ){}
}