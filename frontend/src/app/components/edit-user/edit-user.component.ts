import { MAT_DIALOG_DATA, MatDialogRef } from '@angular/material/dialog';
import { Component, Inject, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { UserService } from 'src/app/services/user.service';
import { UserListComponent } from '../user-list/user-list.component';

@Component({
  selector: 'app-edit-user',
  templateUrl: './edit-user.component.html',
  styleUrls: ['./edit-user.component.css']
})
export class EditUserComponent implements OnInit {

  updateUserForm: FormGroup;
  userId: number;

  constructor(
    private userService: UserService,
    private fb: FormBuilder,
    private dialogRef: MatDialogRef<EditUserComponent>,
    @Inject(MAT_DIALOG_DATA) public data: { userListComponent: UserListComponent, id: number }
  ) {
    this.userId = data.id;
    this.updateUserForm = this.fb.group({
      name: ['', [Validators.required, Validators.maxLength(255)]],
      lastname: ['', [Validators.required, Validators.maxLength(255)]],
      email: ['', [Validators.required, Validators.pattern(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)]],
      points: ['', [Validators.required, Validators.min(0), Validators.pattern(/^[0-9]\d*$/)]],
    });
  }

  ngOnInit(): void {
    this.editUser();
  }

  updateUser(userId: number): void {
    if (this.updateUserForm.valid) {
      const editedUser = this.updateUserForm.value;
      this.userService.updateUser(userId, editedUser).subscribe(
        (response) => {
          console.log(response);
          this.data.userListComponent.getUsers();
          this.updateUserForm.reset();
          this.dialogRef.close();
        },
        (error) => {
          console.error('Error al actualizar usuario.', error);
        }
      );
    }
  }

  editUser(): void {
    this.userService.editUser(this.userId).subscribe(
      (response) => {
        const user = response.user;
        this.updateUserForm.patchValue({
          name: user.name,
          lastname: user.lastname,
          email: user.email,
          points: user.points,
        });
      },
      (error) => {
        console.error('Error al obtener datos del usuario para editar.', error);
      }
    );
  }

  cancelButton() {
    this.dialogRef.close();
  }

}
