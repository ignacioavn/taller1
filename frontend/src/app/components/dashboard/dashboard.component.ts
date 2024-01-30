import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { AuthService } from 'src/app/services/auth.service';

@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.css']
})
export class DashboardComponent implements OnInit {

  constructor(private authService: AuthService, private router: Router) { }

  ngOnInit(): void {
  }

  logout(){
    this.authService.logout().subscribe(
      response => {
        console.log('Sesión cerrada con éxito.', response);
        localStorage.removeItem('token');
        this.router.navigate(['login']);
      },
      error => {
        console.error('Error al cerrar sesión.', error);
      }
    )
  }
}
