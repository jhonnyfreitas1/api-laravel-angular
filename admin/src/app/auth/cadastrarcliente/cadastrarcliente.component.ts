import { AuthService } from './../services/auth.service';
import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { HttpErrorResponse } from '@angular/common/http';

@Component({
  selector: 'app-cadastrarcliente',
  templateUrl: './cadastrarcliente.component.html',
  styleUrls: ['./cadastrarcliente.component.css']
})
export class CadastrarclienteComponent implements OnInit {
  form: FormGroup;
  errorCredentials: boolean;

  constructor(private formBuilder:FormBuilder , private authService: AuthService, private router:Router) { }

  ngOnInit() {
    this.form = this.formBuilder.group({
      nome: [null, [Validators.required]],
      cidade: [null,[Validators.required]],
      tipo_pessoa: [null,[Validators.required]],
      email: [null,[Validators.required]],
      senha:[null,[Validators.required]]
});
  }
  onSubmit(){
    this.authService.enviarForm2(this.form.value).subscribe(
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
