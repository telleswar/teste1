@extends('layouts.app')

@section('nome_pagina')
    {{__('- Cinemas')}}
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col"><h2 class="sub-header">Listagem de cinemas</h2></div>
        @if (isset($msg))
            @if ($msg === 'sem_perm')
            <div class="alert alert-danger" role="alert">
                Você não tem permissão para executar essa ação.
            </div>
            @elseif ($msg === 'sucesso')
            <div class="alert alert-success" role="alert">
                Novo cinema inserido com sucesso.
            </div>
            @endif
        @endif
        <div class="col p-1 d-md-flex justify-content-md-end">
            <a href="{{ route('cinemas.create') }}"><button name="novo" class="btn btn-primary me-2">Novo</button></a>
            <button name="voltar" class="btn btn-danger" onclick="window.history.back();">Voltar</button>
        </div>
    </div>
    <div class="row justify-content-center">
        <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <td scope="col">Nome</td>
                <td scope="col">Cnpj</td>
                <td scope="col">Endereço</td>
                <td scope="col">Cidade</td>
                <td scope="col">Tipo</td>
                <td scope="col">Ações</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($ListaCinemas as $Cinema)
            <tr>
                <th scope="row" class="col">{{$Cinema->id}}</th>
                <td class="col-3">{{$Cinema->nome}}</td>
                <td class="col">{{$Cinema->cnpj}}</td>
                <td class="col-3">{{$Cinema->endereco}}</td>
                <td class="col">{{$Cinema->cidade->nome.'-'.$Cinema->cidade->uf}}</td>
                <td class="col">
                @if ($Cinema->is_matriz)
                    Matriz
                @else
                    Filial
                @endif
                </td>
                <td>
                    <a href="{{ Route('cinemas.edit',['cinema' => $Cinema->id])}}">
                        <ion-icon name="pencil-outline" title="Editar"></ion-icon></a>
                    <a href="{{ Route('cinemas.destroy',['cinema' => $Cinema->id])}}">
                        <ion-icon name="trash-outline" title="Excluir"></ion-icon></a>
                    <a href="{{ Route('salas.ver',['cinema' => $Cinema->id])}}">
                        <ion-icon name="extension-puzzle-outline" title="Ver salas" desc></ion-icon></a>
                    <a href="{{ Route('sessoes.ver',['cinema' => $Cinema->id])}}">
                        <ion-icon name="videocam-outline" title="Ver sessoes" desc></ion-icon></a>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div>
@endsection
