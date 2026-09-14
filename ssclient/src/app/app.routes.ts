import { Routes } from '@angular/router';
import { Home } from './pages/home/home';
import { Adverts } from './pages/adverts/adverts';
import { Whoami } from './pages/whoami/whoami';
import { Login } from './pages/login/login';
import { Register } from './pages/register/register';

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
    path: 'whoami',
    component: Whoami,
  },
  {
    path: 'login',
    component: Login,
  },
  {
    path: 'register',
    component: Register,
  },
];
