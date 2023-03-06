@extends('layouts.app')

@section('nome_pagina')
    {{__('- Sessões: '.$cinema->nome)}}
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col"><h2 class="sub-header">Listagem de sessões: {{$cinema->nome}}</h2></div>
        @if (isset($msg))
            @if ($msg === 'sem_perm')
            <div class="alert alert-danger" role="alert">
                Você não tem permissão para executar essa ação.
            </div>
            @elseif ($msg === 'sucesso')
            <div class="alert alert-success" role="alert">
                Nova sessão inserida com sucesso.
            </div>
            @endif
        @endif
        <div class="col p-1 d-md-flex justify-content-md-end">
            <a href="{{ route('sessoes.create',['cinema' => $cinema->id]) }}"><button name="novo" class="btn btn-primary me-2">Novo</button></a>
            <button name="voltar" class="btn btn-danger" onclick="window.history.back();">Voltar</button>
        </div>
    </div>
    <div class="row justify-content-center">
        <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <td scope="col">Filme</td>
                <td scope="col">Tipo</td>
                <td scope="col">Sala</td>
                <td scope="col">Data</td>
                <td scope="col">Início</td>
                <td scope="col">Término</td>
                <td scope="col">Ações</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($ListaSessoes as $Sessao)
            <tr>
                <th scope="row" class="col">{{$Sessao->id}}</th>
                <td class="col-3">{{$Sessao->filme->titulo}}</td>
                <td class="col">{{$Sessao->tipo}}</td>
                <td class="col-1">{{$Sessao->sala->nome_sala}}</td>
                <td class="col">{{$Sessao->data}}</td>
                <td class="col">{{$Sessao->hora_inicio}}</td>
                <td class="col">{{$Sessao->hora_termino}}</td>
                <td class="col-1">
                    <a href="{{ Route('sessoes.edit',['sessao' => $Sessao->id])}}">
                        <ion-icon name="pencil-outline" title="Editar"></ion-icon></a>
                    <a href="{{ Route('sessoes.destroy',['sessao' => $Sessao->id])}}">
                        <ion-icon name="trash-outline" title="Excluir"></ion-icon></a>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div>
@endsection
