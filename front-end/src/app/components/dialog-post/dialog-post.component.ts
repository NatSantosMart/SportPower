import {Component} from '@angular/core';
import {MatDialog, MatDialogModule} from '@angular/material/dialog';
import {MatButtonModule} from '@angular/material/button';
import { PostService } from '../../services/post.service';
import { CommentService } from '../../services/comment.service';
import {MatSelectModule} from '@angular/material/select';
import {MatInputModule} from '@angular/material/input';
import {MatFormFieldModule} from '@angular/material/form-field';
import { Router } from '@angular/router';
import { Comment } from '../../models/comment.model';
import { Post } from '../../models/post.model';
import { FormsModule } from '@angular/forms';
import { MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';

@Component({
  selector: 'app-dialog-post',
  templateUrl: './dialog-post.component.html',
  styleUrl: './dialog-post.component.css', 
  standalone: true,
  providers: [ CommentService, PostService],
  imports: [FormsModule, MatDialogModule, MatButtonModule, MatFormFieldModule, MatInputModule, MatSelectModule],
})
export class DialogPostComponent {
  newComment: any;
  solicitud: any;
  newPost: any;

  constructor(
    private dialogRef: MatDialogRef<DialogPostComponent>,
    private _commentsService: CommentService,
    private _postsService: PostService,
    private router: Router
  ) {
    this.newComment = {
      description: '',
      date: '',
      url_image: '',
      client_dni: ''
    };
    this.newPost = {
      comment_id: '', 
      type: '',
    };
    this.solicitud = {};
  }

  pressAddPostComment() {

    const currentDate = new Date();
    const formattedDate = currentDate.toISOString().split('T')[0];
    this.newComment.date = formattedDate;

    this.newComment.client_dni = "34567890C"; 
    this.newComment.description = this.solicitud.description; 

    this._commentsService.createComment(this.newComment).subscribe(
      (response) => {

        // Crear un nuevo post utilizando el ID del comentario
        const commentId = response.data.id;
        this.newPost.comment_id = commentId; 
        this.newPost.type = this.solicitud.type; 
        
        this._postsService.createPost(this.newPost).subscribe(
          (postResponse) => {
            console.log('Post created successfully:', postResponse);
             this.dialogRef.close();
          },
          (postError) => {
            console.error('Error creating post:', postError);
          }
        );
      },
      (error) => {
        console.error('Error creating comment:', error);
      }
    );
  }
}