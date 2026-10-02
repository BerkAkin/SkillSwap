import { Routes } from '@angular/router';
import { Home } from './pages/home/home';
import { Adverts } from './pages/adverts/adverts';
import { Whoami } from './pages/whoami/whoami';
import { Register } from './pages/register/register';
import { CreateAdvert } from './pages/create-advert/create-advert';

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
    path: 'create-advert',
    component: CreateAdvert,
  },
  {
    path: 'whoami',
    component: Whoami,
  },
  {
    path: 'register',
    component: Register,
  },
];
