@extends('layouts.form')

@section('nome_pagina')
    {{__('- Nova compra')}}
@endsection

@section('content')
    <div class="content">
        <div class="container px-5 my-5">
            <div class="row">
                <div class="col"><h2 class="sub-header">Nova compra</h2></div>
            </div>
            <form class="g-3 needs-validation" method="POST" action="{{ route('recibos.store') }}" novalidate>
                @csrf
                <div class="my-3 col">
                    <div class="form-floating">
                        <select class="form-select" name="id_sessao" id="id_sessao" required disabled>
                            <option selected value="{{$sessao->id}}">{{$sessao->id.' - '.$sessao->filme->titulo}}</option>
                        </select>
                        <label for="id_sessao">Sessão</label>
                        <div class="invalid-feedback">Campo obrigatório</div>
                        <input type="hidden" name="id_sessao" value="{{$sessao->id}}" />
                    </div>
                </div>

                <div class="row">
                    <div class="my-3 col">
                        <div class="form-floating">
                            <input class="form-control" type="text" id="Cinema" value="{{$sessao->cinema->nome}}" disabled>
                            <label for="Cinema">Cinema</label>
                        </div>
                    </div>

                    <div class="my-3 col">
                        <div class="form-floating">
                            <input class="form-control" type="text" id="Sala" value="{{$sessao->sala->nome_sala}}" disabled>
                            <label for="Sala">Sala</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="my-3 col">
                        <div class="form-floating">
                            <input class="form-control" type="date" id="Data" value="{{$sessao->data}}" disabled>
                            <label for="Data">Data</label>
                        </div>
                    </div>

                    <div class="my-3 col">
                        <div class="form-floating">
                            <input class="form-control" type="time" id="Hora_inicio" value="{{$sessao->hora_inicio}}" disabled>
                            <label for="Hora_inicio">Início</label>
                        </div>
                    </div>

                    <div class="my-3 col">
                        <div class="form-floating">
                            <input class="form-control" type="time" id="Hora_termino" value="{{$sessao->hora_termino}}" disabled>
                            <label for="Hora_termino">Término</label>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="my-3 col">
                        <div class="form-floating">
                            <input class="form-control" name="cadeira" id="cadeira" type="text" maxlength="2" required>
                            <label for="cadeira">Assento</label>
                            <div class="invalid-feedback">Campo obrigatório</div>
                        </div>
                    </div>

                    <div class="my-3 col">
                        <div class="form-floating">
                            <select class="form-select" name="forma_pagamento" id="forma_pagamento" required>
                                <option selected disabled value="">Selecione...</option>
                                <option value="Cartão de crédito">Cartão de crédito</option>
                                <option value="Cartão de débito">Cartão de débito</option>
                                <option value="Boleto pix">Boleto pix</option>
                            </select>
                            <label for="forma_pagamento">Forma de pagamento</label>
                            <div class="invalid-feedback">Campo obrigatório</div>
                        </div>
                    </div>

                    <div class="my-3 col">
                        <div class="form-floating">
                            <select class="form-select" name="tipo_ingresso" id="tipo_ingresso" required>
                                <option selected disabled value="">Selecione...</option>
                                @foreach ($tipo_ingressos as $tipo_ingresso)
                                    <option value="{{$tipo_ingresso->id}}">{{$tipo_ingresso->descricao.' - R$'.$tipo_ingresso->valor}}</option>
                                @endforeach
                            </select>
                            <label for="tipo_ingresso">Tipo do ingresso</label>
                            <div class="invalid-feedback">Campo obrigatório</div>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-2 d-md-block">
                    <button class="btn btn-primary" type="submit">
                        Comprar
                    </button>
                    <button type="button" class="btn btn-danger" onClick="window.history.back();">
                        Voltar
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection


