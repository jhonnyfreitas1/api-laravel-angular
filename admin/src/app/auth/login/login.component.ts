import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, Validators} from '@angular/forms';
import { AuthService } from '../services/auth.service';
import { HttpResponse } from 'selenium-webdriver/http';
import { HttpErrorResponse } from '@angular/common/http';
import { Router } from '@angular/router';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  form: FormGroup;
  errorCredentials: boolean;

  constructor(private formBuilder:FormBuilder , private authService: AuthService, private router:Router) {}

  ngOnInit() {

    this.form = this.formBuilder.group({
          email: [null, [Validators.required, Validators.email]],
          password: [null,[Validators.required]]
    });
  }

  onSubmit(){
      this.authService.login(this.form.value).subscribe(
          (resp) => {
              this.router.navigate(['admin']);
          },
          (errorResponse:HttpErrorResponse) => {
            console.log(errorResponse)
            if(errorResponse.status === 401){
              this.errorCredentials = true;

            }
          }
      );
  }
}
