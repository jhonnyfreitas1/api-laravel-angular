import { AuthService } from './../auth/services/auth.service';
import { Injectable } from '@angular/core';
import {Observable} from 'rxjs/Observable';
import { CanActivate, Router , CanActivateChild, ActivatedRouteSnapshot, RouterStateSnapshot} from '@angular/router';

@Injectable()

export class AuthGuard implements CanActivate, CanActivateChild {

  constructor(private auth: AuthService, private router:Router) { }

  canActivateChild(route: ActivatedRouteSnapshot, state: RouterStateSnapshot): boolean | Observable<boolean> | Promise<boolean> {

    if(this.auth.check()){
        return true;
    }
      this.router.navigate(['login']);
      return false;
}

  canActivate(route: ActivatedRouteSnapshot, state: RouterStateSnapshot): boolean | Observable<boolean> | Promise<boolean> {

      if(this.auth.check()){
          return true;
      }
        this.router.navigate(['login']);
        return false;
  }

}
