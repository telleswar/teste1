@extends('layouts.app')

@section('nome_pagina')
    - Suas compras
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        @if(session('msg'))
            <div class="alert alert-success" role="alert">
                <p>{{session('msg')}}</p>
            </div>
        @endif
        <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Filme</th>
                <th scope="col">Sala</th>
                <th scope="col">Assento</th>
                <th scope="col">Sessão</th>
                <th scope="col">Tipo</th>
                <th scope="col">Data</th>
                <th scope="col">Hora</th>
                <th scope="col">Ingresso</th>
                <th scope="col">Valor</th>
                <th scope="col">Forma de pagamento</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ListaRecibos as $Recibo)
            <tr>
                <th scope="row" class="col">{{$Recibo->id}}</th>
                <td class="col-3">{{$Recibo->sessao->filme->titulo}}</td>
                <td class="col">{{$Recibo->sessao->sala->nome_sala}}</td>
                <td class="col">{{$Recibo->cadeira}}</td>
                <td class="col-2">{{$Recibo->sessao->data.' - '.$Recibo->sessao->hora_inicio}}</td>
                <td class="col">{{$Recibo->sessao->tipo}}</td>
                <td class="col">{{$Recibo->data}}</td>
                <td class="col">{{$Recibo->hora}}</td>
                <td class="col">{{$Recibo->tipo_ingresso->descricao}}</td>
                <td class="col">{{'R$ '.$Recibo->tipo_ingresso->valor}}</td>
                <td class="col-4">{{$Recibo->forma_pagamento}}</td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div>
@endsection
