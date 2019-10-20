import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { LoginComponent } from './login/login.component';
import { ReactiveFormsModule, FormsModule } from '@angular/forms';
import { AuthService } from './services/auth.service';
import { HttpClientModule } from '@angular/common/http';
import { ProfileComponent } from './profile/profile.component';
import { CadastrarclienteComponent } from './cadastrarcliente/cadastrarcliente.component';
import { CadastrarprodutoComponent } from './cadastrarproduto/cadastrarproduto.component';


@NgModule({
  imports: [
    CommonModule,
    ReactiveFormsModule,
    FormsModule,
    HttpClientModule
  ],
  declarations: [
    LoginComponent,
    ProfileComponent,
    CadastrarclienteComponent,
    CadastrarprodutoComponent
  ],
  providers:[
      AuthService
  ]
})
export class AuthModule { }
