import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ProductsListAdminComponent } from './products-list.component';

describe('ProductsListAdminComponent', () => {
  let component: ProductsListAdminComponent;
  let fixture: ComponentFixture<ProductsListAdminComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [ProductsListAdminComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(ProductsListAdminComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
