import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EnhancedComponent } from './enhanced.component';

describe('EnhancedComponent', () => {
  let component: EnhancedComponent;
  let fixture: ComponentFixture<EnhancedComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [EnhancedComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(EnhancedComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
