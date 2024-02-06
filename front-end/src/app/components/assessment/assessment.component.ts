import { CommonModule } from '@angular/common';
import { Component, ElementRef, OnInit, ViewChild } from '@angular/core';
import { MaterialModule } from '../../material.module';

@Component({
  selector: 'app-assessment',
  standalone: true,
  imports: [CommonModule, MaterialModule],
  templateUrl: './assessment.component.html',
  styleUrl: './assessment.component.css'
})
export class AssessmentComponent implements OnInit {

  ratingValue: number = 0;

 

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

}
