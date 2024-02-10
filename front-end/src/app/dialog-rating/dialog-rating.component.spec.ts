import { ComponentFixture, TestBed } from '@angular/core/testing';

import { DialogRatingComponent } from './dialog-rating.component';

describe('DialogRatingComponent', () => {
  let component: DialogRatingComponent;
  let fixture: ComponentFixture<DialogRatingComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [DialogRatingComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(DialogRatingComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
