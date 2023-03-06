@extends('layouts.form')

@section('nome_pagina')
    {{__('- Editando filme')}}
@endsection

@section('content')
    <div class="content">
        <div class="container px-5 my-5">
            <div class="row">
                <div class="col"><h2 class="sub-header">Editando filme</h2></div>
            </div>
            <form class="g-3 needs-validation" method="POST" action="{{ route('filmes.update',['filme' => $filme->id]) }}" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="my-3">
                    <div class="form-floating">
                        <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Digite..." value="{{$filme->titulo}}" required>
                        <label for="titulo">Título</label>
                        <div class="invalid-feedback">Campo obrigatório</div>
                    </div>
                </div>

                <div class="row">
                    <div class="my-3 col">
                        <div class="form-floating">
                            <input type="number" name="ano_lanc" id="ano_lanc" class="form-control" placeholder="Digite..." value="{{$filme->ano_lanc}}" min="1900" max="2099" step="1" value="2022" required>
                            <label for="ano_lanc">Ano</label>
                            <div class="invalid-feedback">Campo obrigatório</div>
                        </div>
                    </div>

                    <div class="my-3 col-5">
                        <div class="form-floating">
                            <input maxlength="3" type="text" name="classificacao" id="classificacao" class="form-control" placeholder="Digite..." value="{{$filme->classificacao}}" required>
                            <label for="classificacao">Classificação</label>
                            <div class="invalid-feedback">Campo obrigatório</div>
                        </div>
                    </div>
                </div>

                <div class="my-3">
                    <div class="form-floating">
                        <input type="text" name="categorias" id="categorias" class="form-control" placeholder="Digite..." value="{{$filme->categorias}}" required>
                        <label for="categorias">Categorias</label>
                        <div class="invalid-feedback">Campo obrigatório</div>
                    </div>
                </div>

                <div class="my-3">
                    <label for="image">Capa</label>
                    <input type="file" name="image" id="image" class="form-control" placeholder="Selecione...">
                    <div class="invalid-feedback">Campo obrigatório</div>
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

