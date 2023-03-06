@extends('layouts.form')

@section('nome_pagina')
    {{__('- Novo cinema')}}
@endsection

@section('content')
    <div class="content">
        <div class="container px-5 my-5">
            <div class="row">
                <div class="col"><h2 class="sub-header">Novo cinema</h2></div>
            </div>
            <form class="g-3 needs-validation" method="POST" action="{{ route('cinemas.store') }}" novalidate>
                @csrf
                <div class="my-3">
                    <div class="form-floating">
                        <input type="text" name="nome" id="nome" class="form-control" placeholder="Digite..." required>
                        <label for="nome">Nome</label>
                        <div class="invalid-feedback">Campo obrigatório</div>
                    </div>
                </div>

                <div class="my-3">
                    <div class="form-floating">
                        <input type="text" name="cnpj" id="cnpj" class="form-control" placeholder="Digite..." required>
                        <label for="cnpj">Cnpj</label>
                        <div class="invalid-feedback">Campo obrigatório</div>
                    </div>
                </div>

                <div class="my-3">
                    <div class="form-floating">
                        <input type="text" name="endereco" id="endereco" class="form-control" placeholder="Digite..." required>
                        <label for="endereco">Endereço</label>
                        <div class="invalid-feedback">Campo obrigatório</div>
                    </div>
                </div>

                <div class="my-3">
                    <div class="form-floating">
                        <select class="form-select" name="cidade" id="cidade" required>
                            <option selected disabled value="">Selecione...</option>
                            @foreach ($ListaCidades as $cidade)
                                <option value="{{$cidade->id}}">{{$cidade->nome.'-'.$cidade->uf}}</option>
                            @endforeach
                        </select>
                        <label for="cidade">Cidade</label>
                        <div class="invalid-feedback">Campo obrigatório</div>
                    </div>
                </div>

                <div class="my-3">
                    <label for="tipo">Tipo</label>
                    <div class="form-check" required>
                      <input class="form-check-input" type="radio" name="tipo" id="rdPj" value="1">
                      <label class="form-check-label" for="rdPj">
                        Matriz
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="tipo" id="rdPf" value="0" checked>
                      <label class="form-check-label" for="rdPf">
                        Filial
                      </label>
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

