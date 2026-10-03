import { Routes } from '@angular/router';
import { Home } from './pages/home/home';
import { Adverts } from './pages/adverts/adverts';
import { Register } from './pages/register/register';
import { UserAdverts } from './pages/user/user-adverts/user-adverts';

export const routes: Routes = [
  {
    path: '',
    redirectTo: 'home',
    pathMatch: 'full',
  },
  {
    path: 'home',
    component: Home,
  },
  {
    path: 'adverts',
    component: Adverts,
  },
  {
    path: 'my-adverts',
    component: UserAdverts,
  },
  {
    path: 'register',
    component: Register,
  },
];
