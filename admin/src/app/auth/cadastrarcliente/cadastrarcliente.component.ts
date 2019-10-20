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
  sucesso: boolean;
  ja_existe:boolean;

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
  onSubmit(e){
    e.preventDefault();
    this.authService.enviarForm2(this.form.value).subscribe(
      (resp) => {
          this.router.navigate(['admin/cadastrar/cliente']);

          if(resp[0] == "create"){
            this.sucesso = true;
            this.errorCredentials= false;
            this.ja_existe= false;
          }
        },
      (errorResponse:HttpErrorResponse) => {
        if(errorResponse.status == 412){
          this.errorCredentials = true;
          this.sucesso = false;
          this.ja_existe = false;
        }
        if(errorResponse.status == 411){
          this.ja_existe = true;
          this.errorCredentials = false;
          this.sucesso = false;
        }
      }
  );
  }

}
