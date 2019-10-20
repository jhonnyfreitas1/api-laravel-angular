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
  constructor(private formBuilder:FormBuilder , private authService: AuthService, private router:Router) { }

  ngOnInit() {

    this.form = this.formBuilder.group({
          nome: [null, [Validators.required]],
          id: [null,[Validators.required]],
          descricao: [null,[Validators.required]],
    });
  }

  onSubmit(){
    this.authService.enviarForm(this.form.value).subscribe(
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
