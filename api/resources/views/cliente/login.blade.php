@extends('layouts.layout')


@section('js')

@endsection



@section('content')
<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <h2 class="header title mt-5"><b>Logue</b><span class="text-info">Now<span></h2>
        <div class="card card-signin my-5" id="radius">
          Área do cliente
            <div class="card-body">
@foreach($errors->all() as $error)
                <li>{{$error}}</li>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
              @endforeach
              @if(session('fail'))
                <ol class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                    @foreach(session('fail') as $key)
                      <p>{{$key}}</p>
                    @endforeach
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </ol>
                <?php Session::pull('fail')?>
              @endif

              @if(session('success'))
                <ol class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                    <p>{{session('success')}}</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </ol>
                <?php Session::pull('fail')?>
              @endif

            <form class="form-signin" method="post" action="{{route('login.entrar')}}">
              {{ csrf_field() }}
              <div class="form-label-group">
                  <label class="text-center" for="inputEmail">E-mail</label>
                <input name="user_email" type="email" id="inputEmail" class="form-control" placeholder="E-mail" value="{{old('user_email')}}" required autofocus>
              </div>

              <div class="form-label-group">
                  <label class="text-center" for="inputPassword">Senha</label>
                <input name="password" type="password" id="inputPassword" class="form-control mb-5" placeholder="Password" required>
              </div>

              <hr class="my-4">
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Entrar</button>

            </form>
            </div>
        </div>
      </div>
    </div>

@endsection
