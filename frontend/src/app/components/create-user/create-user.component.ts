import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { User } from 'src/app/interfaces/user';
import { UserService } from 'src/app/services/user.service';
import { MatDialogRef } from '@angular/material/dialog';
import { Router } from '@angular/router';

@Component({
  selector: 'app-create-user',
  templateUrl: './create-user.component.html',
  styleUrls: ['./create-user.component.css']
})
export class CreateUserComponent implements OnInit {

  createUserForm: FormGroup;

  constructor(
    private userService: UserService,
    private fb: FormBuilder,
    private dialogRef: MatDialogRef<CreateUserComponent>,
    private router: Router) {

    this.createUserForm = this.fb.group({
      rut: ['', [Validators.required]],
      name: ['', [Validators.required, Validators.maxLength(255)]],
      lastname: ['', [Validators.required, Validators.maxLength(255)]],
      email: ['', [Validators.required, Validators.pattern(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)]],
      points: ['', [Validators.required, Validators.min(0), Validators.pattern(/^[0-9]\d*$/)]],
    });
  }

  ngOnInit(): void {
  }

  createUser(){
    if (this.createUserForm.valid){
      this.userService.createUser(this.createUserForm.value).subscribe(
        response => {
          console.log(response);
          this.dialogRef.close();
        },
        error => {
          console.error('Error al crear usuario.', error);
        }
      );
    }
  }

  cancelButton(){
    this.dialogRef.close();
  }
}
