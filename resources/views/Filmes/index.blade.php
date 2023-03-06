@extends('layouts.app')

@section('nome_pagina')
    {{__('- Filmes')}}
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col"><h2 class="sub-header">Listagem de filmes</h2></div>
        @if (isset($msg))
            @if ($msg === 'sem_perm')
            <div class="alert alert-danger" role="alert">
                Você não tem permissão para executar essa ação.
            </div>
            @elseif ($msg === 'sucesso')
            <div class="alert alert-success" role="alert">
                Novo filme inserido com sucesso.
            </div>
            @endif
        @endif
        <div class="col p-1 d-md-flex justify-content-md-end">
            <a href="{{ route('filmes.create') }}"><button name="novo" class="btn btn-primary me-2">Novo</button></a>
            <button name="voltar" class="btn btn-danger" onclick="window.history.back();">Voltar</button>
        </div>
    </div>
    <div class="row justify-content-center">
        <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <td scope="col">Título</td>
                <td scope="col">Ano</td>
                <td scope="col">Classificação</td>
                <td scope="col">Categorias</td>
                <td scope="col">Ações</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($ListaFilmes as $filme)
            <tr>
                <th scope="row" class="col">{{$filme->id}}</th>
                <td class="col-3">{{$filme->titulo}}</td>
                <td class="col">{{$filme->ano_lanc}}</td>
                <td class="col">{{$filme->classificacao}}</td>
                <td class="col">{{$filme->categorias}}</td>
                <td>
                    <a href="{{ Route('filmes.edit',['filme' => $filme->id])}}">
                        <ion-icon name="pencil-outline" title="Editar"></ion-icon></a>
                    <a href="{{ Route('filmes.destroy',['filme' => $filme->id])}}">
                        <ion-icon name="trash-outline" title="Excluir"></ion-icon></a>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div>
@endsection
