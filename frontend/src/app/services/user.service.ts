import { AuthService } from 'src/app/services/auth.service';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { HttpClient, HttpHeaders } from '@angular/common/http';;
import { User } from '../interfaces/user';

@Injectable({
  providedIn: 'root'
})
export class UserService {

  private url = "http://127.0.0.1:8000/api";

  constructor(private http: HttpClient, private authService: AuthService) {}

  getUsers(): Observable<User[]> {
    const token = this.authService.getToken();
    if (token) {
      const headers = new HttpHeaders({'Authorization': `Bearer ${token}`});
      return this.http.get<User[]>(`${this.url}/users`, { headers });
    } else {
      console.log('Token no encontrado');
      return new Observable();
    }
  }

  createUser(createUserForm: any): Observable<any> {
    const token = this.authService.getToken();
    if (token) {
      const headers = new HttpHeaders({ 'Authorization': `Bearer ${token}` });
      return this.http.post<any>(`${this.url}/users/new`, createUserForm , { headers });
    } else {
      console.log('Token no encontrado');
      return new Observable();
    }
  }

  deleteUser(id: number): Observable<void> {
    const token = this.authService.getToken();
    if (token) {
      const headers = new HttpHeaders({ 'Authorization': `Bearer ${token}` });
      return this.http.delete<void>(`${this.url}/users/${id}`, { headers });
    } else {
      console.log('Token no encontrado');
      return new Observable();
    }
  }
}
