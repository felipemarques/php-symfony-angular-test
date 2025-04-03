import { Routes } from '@angular/router';

import { IndexComponent as HomeComponent } from './home/index/index.component';
import { IndexComponent as ProductListComponent } from './product/index/index.component';

export const routes: Routes = [
  { path: '', component: HomeComponent },

  { path: 'products', redirectTo: 'products/index', pathMatch: 'full' },
  { path: 'products/index', component: ProductListComponent },
];
