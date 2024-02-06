import {Component} from '@angular/core';
import {MatDialog, MatDialogModule} from '@angular/material/dialog';
import {MatButtonModule} from '@angular/material/button';

@Component({
  selector: 'app-dialog-post',
  templateUrl: './dialog-post.component.html',
  styleUrl: './dialog-post.component.css', 
  standalone: true,
  imports: [MatDialogModule, MatButtonModule],
})
export class DialogPostComponent {}