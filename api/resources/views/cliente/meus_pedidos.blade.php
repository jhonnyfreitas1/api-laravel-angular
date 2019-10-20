@extends('layouts.layout')


@section('js')

@endsection

@section('content')


    <div class="container bg-light row-2 border border-primary">
        <ul class="list-group">
            @foreach($produtos_nome as $pedido)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <p><b>Produto:</b>{{$pedido['nome']}}</p>

               <b>Identificador:<span class="badge badge-info badge-pill">{{$pedido['numero']}}</span> </b>
             </li>
            @endforeach
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Total de pedidos
            <span class="badge badge-danger badge-pill">{{$total}}</span>
        </li>
        </ul>
    </div>
    <a href="/" class="btn btn-outline-dark m-5 col-md-5 float-left fixed-bottom">Home</a>
@endsection
