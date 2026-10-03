import { Routes } from '@angular/router';
import { Home } from './pages/home/home';
import { Adverts } from './pages/adverts/adverts';
import { Register } from './pages/register/register';
import { MyAdverts } from './pages/create-advert/my-adverts';

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
    component: MyAdverts,
  },
  {
    path: 'register',
    component: Register,
  },
];
