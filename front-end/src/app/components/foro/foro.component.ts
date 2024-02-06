import { Component, OnInit } from '@angular/core';
import { ToolbarComponent } from '../toolbar/toolbar.component';
import { CommonModule } from '@angular/common';
import { CommentService } from '../../services/comment.service';
import { Router } from '@angular/router';
import { HttpClientModule } from '@angular/common/http';
import { PostService } from '../../services/post.service';
import { ClientService } from '../../services/client.service';

@Component({
  selector: 'app-foro',
  standalone: true,
  imports: [ToolbarComponent, CommonModule, HttpClientModule],
  providers: [ CommentService, PostService, ClientService],
  templateUrl: './foro.component.html',
  styleUrls: ['./foro.component.css']
})
export class ForoComponent implements OnInit {
  constructor(
    private _commentsService: CommentService,
    private _postsService: PostService,
    private _clientsService: ClientService,
    private router: Router
  ) {}

  posts: any[] = [];
  comments: any[] = [];

  ngOnInit() {
    this._postsService.getAllPosts().subscribe(
      (data: any) => {
        this.posts = data.data;
        this.posts.forEach(post => {
          this._commentsService.getCommentById(post.comment_id).subscribe(
            (data: any) => {      
              post.comment = data.data; 

              //Client
              this.posts.forEach(post => {
                this._clientsService.getClientById(post.comment.client_dni).subscribe(
                  (data: any) => {      
                    post.comment.client = data.data; 
                  },
                  (error: any) => {
                    console.error(error);
                  }
                );
              });

            },
            (error: any) => {
              console.error(error);
            }
          );
        });
      },
      (error: any) => {
        console.error(error);
      }
    );
  }
}