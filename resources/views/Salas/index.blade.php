@extends('layouts.app')

@section('nome_pagina')
    {{ __('- Salas: ' . $cinema->nome) }}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="sub-header">Listagem de salas: {{ $cinema->nome }}</h2>
            </div>
            @if (isset($msg))
                @if ($msg === 'sem_perm')
                    <div class="alert alert-danger" role="alert">
                        Você não tem permissão para executar essa ação.
                    </div>
                @elseif ($msg === 'sucesso')
                    <div class="alert alert-success" role="alert">
                        Nova sala inserida com sucesso.
                    </div>
                @endif
            @endif
            <div class="col p-1 d-md-flex justify-content-md-end">
                <a href="{{ route('salas.create', ['cinema' => $cinema->id]) }}"><button name="novo"
                        class="btn btn-primary me-2">Novo</button></a>
                <button name="voltar" class="btn btn-danger" onclick="window.history.back();">Voltar</button>
            </div>
        </div>
        <div class="row justify-content-center">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <td scope="col">Nome</td>
                        <td scope="col">Quantidade de assentos</td>
                        <td scope="col">Ações</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ListaSalas as $Sala)
                        <tr>
                            <th scope="row" class="col">{{ $Sala->id }}</th>
                            <td class="col-3">{{ $Sala->nome_sala }}</td>
                            <td class="col">{{ $Sala->fileiras * $Sala->cadeiras }}</td>
                            <td>
                                <a href="{{ Route('salas.edit', ['sala' => $Sala->id]) }}">
                                    <ion-icon name="pencil-outline" title="Editar"></ion-icon>
                                </a>
                                <a href="{{ Route('salas.destroy', ['sala' => $Sala->id]) }}">
                                    <ion-icon name="trash-outline" title="Excluir"></ion-icon>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
