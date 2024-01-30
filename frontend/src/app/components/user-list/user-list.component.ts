import { Component, OnInit, ViewChild } from '@angular/core';
import { UserService } from 'src/app/services/user.service';
import { User } from 'src/app/interfaces/user';
import { MatTableDataSource } from '@angular/material/table';
import { MatPaginator } from '@angular/material/paginator';
import { MatDialog } from '@angular/material/dialog';
import { CreateUserComponent } from '../create-user/create-user.component';

@Component({
  selector: 'app-user-list',
  templateUrl: './user-list.component.html',
  styleUrls: ['./user-list.component.css']
})
export class UserListComponent implements OnInit {

  users: User[] = [];
  displayedColumns: string[] = ['rut', 'name', 'lastname', 'email', 'points'];
  userDataSource = new MatTableDataSource<User>([]);

  @ViewChild(MatPaginator) paginator!: MatPaginator;

  constructor(
    private userService: UserService,
    private dialog: MatDialog) { }

  ngOnInit(): void {
    this.getUsers();
  }

  getUsers() {
    this.userService.getUsers().subscribe(
      (data: any) => {
        this.users = data.users;
        this.userDataSource.data = this.users;
        this.userDataSource.paginator = this.paginator;
        console.log(data);
      },
      (error) => {
        console.error('Error obteniendo usuarios.', error);
      }
    );
  }

  openCreateUser(){
    this.dialog.open(CreateUserComponent);
  }
}
