import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { HttpClient, HttpHeaders } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class AuthService {

  private url = "http://127.0.0.1:8000/api";

  constructor(private http: HttpClient) {}

  login(loginForm: any): Observable<any> {
    return this.http.post<any>(`${this.url}/login`, loginForm);
  }

  getToken(): string | null {
    return localStorage.getItem('token');
  }

  logout(): Observable<any> {
    const token = this.getToken();
    if (token) {
      const headers = new HttpHeaders({'Authorization': `Bearer ${token}`});
      return this.http.post<any>(`${this.url}/logout`, {}, { headers });
    } else {
      console.log('Token no encontrado');
      return new Observable();
    }
  }
}
