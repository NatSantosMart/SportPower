import { Component, OnInit } from '@angular/core';
import { ToolbarComponent } from '../toolbar/toolbar.component';
import { ToolbarComponentAdmin } from '../admin/toolbar/toolbar.component';
import { CommonModule } from '@angular/common';
import { CommentService } from '../../services/comment.service';
import { Router } from '@angular/router';
import { HttpClientModule } from '@angular/common/http';
import { PostService } from '../../services/post.service';
import { ClientService } from '../../services/client.service';
import {MatDialog, MatDialogModule} from '@angular/material/dialog';
import {MatButtonModule} from '@angular/material/button';
import { MaterialModule } from '../../material.module';
import { DialogPostComponent } from '../dialog-post/dialog-post.component';
import { AuthenticatorService } from '../../services/authenticator.service';


@Component({
  selector: 'app-foro',
  standalone: true,
  imports: [ToolbarComponent, ToolbarComponentAdmin, CommonModule, DialogPostComponent, HttpClientModule, MatButtonModule, MatDialogModule, MaterialModule],
  providers: [ CommentService, PostService, ClientService, AuthenticatorService],
  templateUrl: './foro.component.html',
  styleUrls: ['./foro.component.css']
})
export class ForoComponent implements OnInit {
  constructor(
    private _commentsService: CommentService,
    private _postsService: PostService,
    private _clientsService: ClientService,
    private _authenticatorService: AuthenticatorService,
    public dialog: MatDialog, 
    private router: Router
  ) {}

  posts: any[] = [];
  comments: any[] = [];
  currentUserEmail: any; 
  isAdmin: any; 

  ngOnInit(): void {

    this.currentUserEmail = this._authenticatorService.currentUser.email; 
    if(this.currentUserEmail === "admin@gmail.com"){
      this.isAdmin = true; 
    }

    this._postsService.getAllPosts().subscribe(
      (postsData: any) => {
        this.posts = postsData.data;
        this.getComment();
      },
      (error: any) => {
        console.error(error);
      }
    );
  }

  private getComment(): void {
    this.posts.forEach(post => {
      this._commentsService.getCommentById(post.comment_id).subscribe(
        (commentData: any) => {
          post.comment = commentData.data;
          this.getClientForComment(post.comment);
        },
        (error: any) => {
          console.error(error);
        }
      );
    });
  }

  private getClientForComment(comment: any): void {
    this._clientsService.getClientById(comment.client_dni).subscribe(
      (clientData: any) => {
        comment.client = clientData.data;
      },
      (error: any) => {
        console.error(error);
      }
    );
  }

  openDialog() {
    const dialogRef = this.dialog.open(DialogPostComponent);

    dialogRef.afterClosed().subscribe(result => {
      console.log(`Dialog result: ${result}`);
      location.reload();
    });
  }
}