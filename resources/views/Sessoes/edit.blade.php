@extends('layouts.form')

@section('nome_pagina')
    {{__('- Nova sessão')}}
@endsection

@section('content')
    <div class="content">
        <div class="container px-5 my-5">
            <div class="row">
                <div class="col"><h2 class="sub-header">Nova sessão</h2></div>
            </div>
            <form class="g-3 needs-validation" method="POST" action="{{ route('sessoes.store') }}" novalidate>
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

            <div class="row">
                <div class="my-3 col-6">
                    <div class="form-floating">
                        <select class="form-select" name="id_sala" id="id_sala" required>
                            <option selected disabled value="">Selecione...</option>
                            @foreach ($cinema->salas as $sala)
                                <option value="{{$sala->id}}" {{ ($sala->id == $sessao->id_sala) ? 'selected' : ''}}>
                                    {{$sala->nome_sala}}
                                </option>
                            @endforeach
                        </select>
                        <label for="id_sala">Sala</label>
                        <div class="invalid-feedback">Campo obrigatório</div>
                    </div>
                </div>

                <div class="my-3 col-6">
                    <div class="form-floating">
                        <select class="form-select" name="tipo" id="tipo" required>
                            <option value="2D" {{ ($sessao->tipo == '2D') ? 'selected' : ''}}>
                                2D
                            </option>
                            <option value="3D"{{ ($sessao->tipo == '3D') ? 'selected' : ''}}>
                                3D
                            </option>
                        </select>
                        <label for="tipo">Tipo</label>
                        <div class="invalid-feedback">Campo obrigatório</div>
                    </div>
                </div>
            </div>

                <div class="my-3">
                    <div class="form-floating">
                        <select class="form-select" name="id_filme" id="id_filme" required>
                            <option selected disabled value="">Selecione...</option>
                            @foreach ($ListaFilmes as $filme)
                                <option value="{{$filme->id}}" {{ ($filme->id == $sessao->id_filme) ? 'selected' : ''}}>
                                    {{$filme->titulo}}
                                </option>
                            @endforeach
                        </select>
                        <label for="id_filme">Filme</label>
                        <div class="invalid-feedback">Campo obrigatório</div>
                    </div>
                </div>

                <div class="row">
                    <div class="my-3 col-4">
                        <div class="form-floating">
                            <input class="form-control" type="date" name="data" id="data" value="{{$sessao->data}}" required>
                            <label for="data">Data</label>
                        </div>
                    </div>

                    <div class="my-3 col-4">
                        <div class="form-floating">
                            <input class="form-control" type="time" name="hora_inicio" id="hora_inicio" value="{{$sessao->hora_inicio}}" required>
                            <label for="hora_inicio">Início</label>
                        </div>
                    </div>

                    <div class="my-3 col-4">
                        <div class="form-floating">
                            <input class="form-control" type="time" name="hora_termino" id="hora_termino" value="{{$sessao->hora_termino}}" required>
                            <label for="hora_termino">Término</label>
                        </div>
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