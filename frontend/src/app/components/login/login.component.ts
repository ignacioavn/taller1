import { Component, OnInit } from '@angular/core';
import { UserService } from 'src/app/services/user.service';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  loginForm: FormGroup;

  constructor(private userService: UserService, private fb: FormBuilder) {
    this.loginForm = this.fb.group({
      username: ['', Validators.required],
      password: ['', Validators.required],
    });
  }

  ngOnInit(): void {
  }

  login() {
    if (this.loginForm.valid) {
      this.userService.login(this.loginForm.value).subscribe(
        response => {
          console.log('Login exitoso', response);
        },
        error => {
          console.error('Error en el inicio de sesión', error);
        }
      );
    }
  }

}
