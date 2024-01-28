import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { HttpClient, HttpHeaders } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class UserService {

  private url = "http://127.0.0.1:8000/api";

  constructor(private http: HttpClient) {}

  login(loginForm: any){
    return this.http.post<any>(`${this.url}/login`, loginForm);
  }
}
