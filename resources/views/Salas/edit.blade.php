@extends('layouts.form')

@section('nome_pagina')
    {{__('- Editando sala')}}
@endsection

@section('content')
    <div class="content">
        <div class="container px-5 my-5">
            <div class="row">
                <div class="col"><h2 class="sub-header">Editando sala</h2></div>
            </div>
            <form class="g-3 needs-validation" method="POST" action="{{ route('salas.update',['sala' => $sala->id]) }}" novalidate>
                @csrf
                <div class="my-3">
                    <div class="form-floating">
                        <select class="form-select" name="id_cinema" id="id_cinema" required disabled>
                            <option selected value="{{$cinema->id}}">{{$cinema->nome}}</option>
                        </select>
                        <label for="id_cinema">Cinema</label>
                        <div class="invalid-feedback">Campo obrigatório</div>
                        <input type="hidden" name="id_cinema" value="{{$cinema->id}}" />
                    </div>
                </div>

                <div class="my-3">
                    <div class="form-floating">
                        <input type="text" name="nome" id="nome" class="form-control" placeholder="Digite..." value="{{$sala->nome_sala}}" required>
                        <label for="nome">Nome</label>
                        <div class="invalid-feedback">Campo obrigatório</div>
                    </div>
                </div>

                <div class="d-grid gap-2 d-md-block">
                    <button class="btn btn-primary" type="submit">
                        Enviar
                    </button>
                    <button type="button" class="btn btn-danger" onClick="window.history.back();">
                        Voltar
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection
