import { MAT_DIALOG_DATA, MatDialogRef } from '@angular/material/dialog';
import { Component, Inject, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { UserService } from 'src/app/services/user.service';
import { UserListComponent } from '../user-list/user-list.component';

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
    @Inject(MAT_DIALOG_DATA) public data: { userListComponent: UserListComponent }
  ) {

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

  createUser(): void {
    if (this.createUserForm.valid) {
      const newUser = this.createUserForm.value;
      this.userService.createUser(newUser).subscribe(
        (response) => {
          console.log(response);
          this.data.userListComponent.getUsers();
          this.dialogRef.close();
        },
        (error) => {
          console.error('Error al crear usuario.', error);
        }
      );
    }
  }

  cancelButton() {
    this.dialogRef.close();
  }
}
