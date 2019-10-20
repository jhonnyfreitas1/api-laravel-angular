@extends('layouts.layout')
    @section('js')

    @endsection
    <div class="col-md-12 row-2  bg-dark">
        <a class=" btn btn-light float-right" href="/cliente/desconectar">Desconectar</a>
        <p class="text-light bg-dark float-right"> Óla <b>{{session('logado')['name']}}</b>
        </p>

    </div>
    @section('content')
    <div class="page-header col-md-12 col-12">
        <h4 class="title" >Produtos disponiveis</h4>
    </div>
    @foreach($produtos as $produto)
        <div class="col-md-4 " style=''>
        <div class='report-module ' style="border:ridge;padding: 1em; background: linear-gradient(to right, #fBA901,#F5DA81,#F5DA81,#babaca );">
            <div class='thumbnail' >
                <h4 class="col-md-12 col-12 text-light bg-info" style="">Nome do produto:<b>{{$produto->nome}}</b></h4>
                <h5 class="col-md-12 col-12 text-muted">Descrição:<b>{{$produto->descricao}}</b></h5>
            </div>
            <div class='produto-content'>
            <div class='produto-meta float-right'>
                <div class="row">
                    <a class="btn btn-info m-1 border border-light shadow-lg" id="but" href="/produto/detalhe/{{$produto-> id}}">Ver produto</a >
                </div>
            </div>
            </div>
        </div>
        </div>
        @endforeach
        {!! $produtos -> Links()!!}

@endsection
