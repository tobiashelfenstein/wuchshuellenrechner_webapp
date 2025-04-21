import { Component, NgModule, Input } from '@angular/core';
import { FormControl, FormGroup, FormsModule, ReactiveFormsModule } from '@angular/forms';
import { Tube } from './models/tube';

@Component({
  selector: 'app-simple',
  imports: [ReactiveFormsModule, FormsModule],
  templateUrl: './simple.component.html',
  styleUrl: './simple.component.css'
})

export class SimpleComponent {
  constructor() {
    let tubeVariant = new Tube();
    tubeVariant.cost = 1.20;

    var num: number = tubeVariant.getSumOfCostsPerTube(0, 0);
    console.log(num);
  }

}
