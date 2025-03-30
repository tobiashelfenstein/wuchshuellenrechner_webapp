import { Component } from '@angular/core';
import { Router, RouterOutlet } from '@angular/router';

import { RouterModule } from '@angular/router';

@Component({
  selector: 'app-root',
  imports: [RouterOutlet, RouterModule],
  templateUrl: './app.component.html',
  styleUrl: './app.component.css'
})
export class AppComponent {
  title = 'wuchshuellenrechner';
}
