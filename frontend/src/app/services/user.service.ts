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
      console.log('Token no encontrado.');
      return new Observable();
    }
  }

  createUser(user : User): Observable<User> {
    const token = this.authService.getToken();
    if (token) {
      const headers = new HttpHeaders({ 'Authorization': `Bearer ${token}` });
      return this.http.post<User>(`${this.url}/users/new`, user , { headers });
    } else {
      console.log('Token no encontrado.');
      return new Observable();
    }
  }

  editUser(id: number): Observable<{ user: User }> {
    const token = this.authService.getToken();
    if (token) {
      const headers = new HttpHeaders({ 'Authorization': `Bearer ${token}` });
      return this.http.get<{ user: User }>(`${this.url}/users/${id}/edit`, { headers });
    } else {
      console.log('Token no encontrado.');
      return new Observable();
    }
  }

  updateUser(id: number, user: User): Observable<User> {
    const token = this.authService.getToken();
    if (token) {
      const headers = new HttpHeaders({ 'Authorization': `Bearer ${token}` });
      return this.http.put<User>(`${this.url}/users/${id}/edit`, user, { headers });
    } else {
      console.log('Token no encontrado.');
      return new Observable();
    }
  }

  deleteUser(id: number): Observable<void> {
    const token = this.authService.getToken();
    if (token) {
      const headers = new HttpHeaders({ 'Authorization': `Bearer ${token}` });
      return this.http.delete<void>(`${this.url}/users/${id}`, { headers });
    } else {
      console.log('Token no encontrado.');
      return new Observable();
    }
  }
}
