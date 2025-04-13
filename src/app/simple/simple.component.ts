import { Component, NgModule, Input } from '@angular/core';
import { FormControl, FormGroup, FormsModule, ReactiveFormsModule } from '@angular/forms';

@Component({
  selector: 'app-simple',
  imports: [ReactiveFormsModule, FormsModule],
  templateUrl: './simple.component.html',
  styleUrl: './simple.component.css'
})

export class SimpleComponent {
  speed = 80;
}
