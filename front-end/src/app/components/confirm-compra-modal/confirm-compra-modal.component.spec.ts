import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ConfirmCompraModalComponent } from './confirm-compra-modal.component';

describe('ConfirmCompraModalComponent', () => {
  let component: ConfirmCompraModalComponent;
  let fixture: ComponentFixture<ConfirmCompraModalComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [ConfirmCompraModalComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(ConfirmCompraModalComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
