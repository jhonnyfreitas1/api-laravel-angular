import { environment } from './../../../environments/environment';
import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders} from "@angular/common/http";
import { Observable } from 'rxjs/Observable';
import 'rxjs/add/operator/do';
import 'rxjs/add/operator/toPromise';
import { Router } from '@angular/router';
import { User }  from './../interfaces/user.model';

@Injectable()
export class AuthService {

  constructor(private http: HttpClient, private router:Router) {


   }

  check(): boolean{
      return localStorage.getItem("token")? true :false;
  }

  login(credentials:{email: string , password: string}):Observable<boolean>{
    return this.http.post<any>(`${environment.api_url}/auth/login`, credentials )
        .do(data =>{
            localStorage.setItem("token" , data.token);
            localStorage.setItem("user" , btoa(JSON.stringify(data.user)));
        });
    ;
  }
  logout(): void{
    this.http.get(`${environment.api_url}/auth/logout`).subscribe(resp =>{
      console.log(resp);
      localStorage.clear();
      this.router.navigate(['login']);
    });
  }
  getUser(): User {
    return localStorage.getItem('user') ? JSON.parse(atob(localStorage.getItem('user'))) : null;

  }
  setUser():Promise<Boolean>{
    return this.http.get<any>(`${environment.api_url}/auth/me`).toPromise()
    .then(data =>{
        if(data.user){
          localStorage.setItem('user' , btoa(JSON.stringify(data.user)))
          return true;
        }
        return false;
    });
  }

  enviarForm(credentials:{nome: string , id: string, descricao:string}):Observable<boolean>{

    const a = this.http.post<any>(`${environment.api_url}/cadastrar/produto`, credentials )
    .do(data =>{
      console.log(a);
      return true;
    });
    console.log(a);
    return a;
  }
  enviarForm2(credentials:{nome: string , id: string, descricao:string}):Observable<boolean>{
    const a = this.http.post<any>(`${environment.api_url}/cadastrar/cliente`, credentials )
    .do(data =>{
      console.log(a);
      return true;
    });
    console.log(a);
    return a;
  }
}
