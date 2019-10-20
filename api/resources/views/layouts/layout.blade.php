<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <meta charset="UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        @yield('js')
		<title>Seja bem vindo</title>
	</head>
	<body>
            <div class="col-md-12 mt-5 d-flex" style="align-items:center; display:flex; justify-content:center;" >
			    <div class="card card-signin col-md-8 row-2" style="display:flex; box-shadow: 10px 10px 5px -4px rgba(0,0,0,0.s5); text-align:center; display:flex; justify-content:;">

                    <div class="row " style="">
                            @yield('content')
                    </div>
                    @if(session()->has('logado'))
                        <div class="row-2 container mt-4">
                        <a class='btn btn-outline-primary m-2 col-10 col-md-2' href="{{route('pedidos')}}">Ver meus pedidos</a>
                        <a class='btn btn-primary m-2  col-10 col-md-2' href="{{route('perfil')}}">Perfil</a>
                        </div>
                    @endif
                </div>
        </div>
	</body>
	<style type="text/css">

    div#index {
        margin: 0px 25px 0px 25px;
    }
    div#titulo h1{
        color: #666;
    }
    .form-row, .form-group{
        text-align: left;
    }
    body{
        background: #666;
  background: linear-gradient(to right, #DBA901,#F5DA81,#F5DA81,#DBA901 );
    }
     label{
        border-bottom: 1px solid #DBA901;
    }
</html>
