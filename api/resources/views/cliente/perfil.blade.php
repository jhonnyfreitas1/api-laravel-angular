@extends('layouts.layout')


@section('js')

@endsection

@section('content')

<table class="fixed-center  table table-hover col-md-12 border border-dark " id='resultados'>
			  <thead class="thead-dark">
				   <tr>
				      <th class="border border-dark" scope="">Dados do Cliente</th>
				      <th class="border border-dark" class="col-md-8" scope="col"><label style="color:#babaca;">Cliente criado em</label> {{session('logado')['created_at']}}</th>
				    </tr>
				    <tbody>
					    <tr>
					      <th class="border border-dark" scope="row">Nome do cliente</th>
					      <td >{{session('logado')['name']}}</td>
					    </tr>
					    <tr>
					      <th  class="border border-dark" scope="row">E-mail do cliente</th>
					      <td id="eliquota">{{session('logado')['email']}}</td>
					    </tr>
				    </tbody>
			    </thead>
            </table>
            <a href="/" class="btn btn-outline-dark m-5 col-md-5 float-left fixed-bottom">Home</a>
@endsection
