import { Routes } from '@angular/router';
import { SimpleComponent } from './simple/simple.component';
import { DescriptionComponent } from './description/description.component';
import { EnhancedComponent } from './enhanced/enhanced.component';

export const routes: Routes = [
    {
        path: '',
        component: DescriptionComponent,
        title: 'Wuchshüllenrechner: Beschreibung',
    },
    {
        path: 'simple',
        component: SimpleComponent,
        title: 'Wuchshüllenrechner: einfacher Modus',
    },
    {
        path: 'enhanced',
        component: EnhancedComponent,
        title: 'Wuchshüllenrechner: erweiterter Modus',
    },
];
