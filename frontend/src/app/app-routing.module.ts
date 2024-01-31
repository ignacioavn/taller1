import { NgModule, Component } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { LoginComponent } from './components/login/login.component';
import { DashboardComponent } from './components/dashboard/dashboard.component';
import { tokenGuard } from './guards/token.guard';
import { UserListComponent } from './components/user-list/user-list.component';
import { CreateUserComponent } from './components/create-user/create-user.component';

const routes: Routes = [
  { path: '', redirectTo: '/login', pathMatch: 'full' },
  { path: 'login', component: LoginComponent },
  { path: 'dashboard', component: DashboardComponent, canActivate: [tokenGuard] },
  { path: 'users', component: UserListComponent, canActivate: [tokenGuard] },
  { path: 'new', component: CreateUserComponent, canActivate: [tokenGuard]},
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
