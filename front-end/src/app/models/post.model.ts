import { Comment } from "./comment.model";

export interface Post{
    comment_id : number;
    type : string;
    comment: Comment | null;
}