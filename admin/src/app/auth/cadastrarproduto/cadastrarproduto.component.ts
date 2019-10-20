import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, Validators} from '@angular/forms';
import { HttpErrorResponse ,HttpClient} from '@angular/common/http';
import { AuthService } from '../services/auth.service';
import { Router } from '@angular/router';
@Component({
  selector: 'app-cadastrarproduto',
  templateUrl: './cadastrarproduto.component.html',
  styleUrls: ['./cadastrarproduto.component.css']
})
export class CadastrarprodutoComponent implements OnInit {
  form: FormGroup;
  errorCredentials: boolean;
  sucesso: boolean;
  ja_existe:boolean;
  constructor(private formBuilder:FormBuilder , private authService: AuthService, private router:Router) { }

  ngOnInit() {

    this.form = this.formBuilder.group({
          nome: [null, [Validators.required]],
          id: [null,[Validators.required]],
          descricao: [null,[Validators.required]],
    });
  }

  onSubmit(e){
    e.preventDefault();
    this.authService.enviarForm(this.form.value).subscribe(
      (resp) => {
        console.log(resp);
        this.router.navigate(['admin/cadastrar/produto']);
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
