import {Component} from '@angular/core';
import {MatDialog, MatDialogModule} from '@angular/material/dialog';
import {MatButtonModule} from '@angular/material/button';
import { RatingService } from '../services/rating.service';
import { CommentService } from '../services/comment.service';
import {MatSelectModule} from '@angular/material/select';
import { MatInputModule } from '@angular/material/input';
import { MatFormFieldModule } from "@angular/material/form-field";
import { MatIconModule } from '@angular/material/icon'
import { ActivatedRoute, Router } from '@angular/router';
import { FormsModule } from '@angular/forms';
import { MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
import { AuthenticatorService } from '../services/authenticator.service';
import { MaterialModule } from '../material.module';
import { CommonModule } from '@angular/common';
import { HttpClientModule } from '@angular/common/http';

@Component({
  selector: 'app-dialog-rating',
  standalone: true,
  templateUrl: './dialog-rating.component.html',
  styleUrl: './dialog-rating.component.css', 
  providers: [ CommentService, RatingService, AuthenticatorService],
  imports: [HttpClientModule, FormsModule, MatDialogModule, MatButtonModule, MatFormFieldModule, MatInputModule, MatSelectModule, MatIconModule],
})
export class DialogRatingComponent {
  newComment: any;
  solicitud: any;
  newRating: any;
  ratingValue: number = 0;
  idProduct: any; 

  constructor(
    private dialogRef: MatDialogRef<DialogRatingComponent>,
    private _commentsService: CommentService,
    private _ratingService: RatingService,
    private _authenticatorService: AuthenticatorService,
    private router: Router, 
    private route: ActivatedRoute
  ) {
    this.newComment = {
      description: '',
      date: '',

      client_dni: ''
    };
    this.newRating = {
      comment_id: 0, 
      product_id: 0,
    };
    this.solicitud = {};
  }


  ngOnInit(): void {
    document.querySelectorAll('.star').forEach((star: Element) => {
        star.addEventListener('click', () => {
            const value: number = parseInt((star as HTMLElement).getAttribute('data-value') || '0', 10);

            document.querySelectorAll('.star').forEach((s: Element) => {
                const sValue: number = parseInt((s as HTMLElement).getAttribute('data-value') || '0', 10);
                (s as HTMLElement).innerHTML = sValue <= value ? 'star' : 'star_border';
                (s as HTMLElement).style.color = sValue <= value ? 'yellow' : 'gray';
            });
        });
    });
  }

  setScore(score: number) {
    this.solicitud.score = score;
  }

  pressAddRatingComment() {

    //const url = this.route.snapshot.url;

    const urlParts = window.location.pathname.split('/');
    this.idProduct = urlParts[urlParts.length - 1]

    console.log(urlParts); 

    const currentDate = new Date();
    const formattedDate = currentDate.toISOString().split('T')[0];
    this.newComment.date = formattedDate;

    this.newComment.client_dni = this._authenticatorService.currentUser.dni; 
    this.newComment.description = this.solicitud.description; 

    this._commentsService.createComment(this.newComment).subscribe(
      (response) => {

        console.log(response); 
        // Crear un nuevo rating utilizando el ID del comentario
        const commentId = response.data.id;
        this.newRating.score = this.solicitud.score; 
        this.newRating.comment_id = commentId; 
        this.newRating.product_id = this.idProduct; 

        console.log(this.newRating); 
        
        this._ratingService.createRating(this.newRating).subscribe(
          (postResponse) => {
             this.dialogRef.close();
          },
          (postError) => {
            console.error('Error:', postError);
          }
        );
      },
      (error) => {
        console.error('Error creating comment:', error);
      }
    );
  }


}

