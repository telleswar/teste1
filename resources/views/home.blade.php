@extends('layouts.base')

@section('head')
    <style>
        .card-header h2{
            font-size: 18px;
            font-weight: bold;
            background-image: linear-gradient(45deg, rgb(37, 201, 223), rgb(0, 202, 91))!important;
            background-clip: text !important;
            color: transparent !important;
        }

        .card {
            min-width: 180px;
            max-width: 450px;
            overflow: hidden;
        }

    </style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mt-5">
            <h3>Lista de pedidos</h3>
            <hr class="mt-3">
        </div>

        <div class="row text-center">
            @foreach ($Pedidos as $pedido)
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 d-flex ms-sm-0 ms-2 align-items-stretch">
                    <div class="card bg-dark">
                        <div class="card-header">
                            <h2>Pedido: {{$pedido->numero}} | {{$pedido->cliente->nome}} | {{$pedido->data_entrega}}</h2>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Valor total: R$ {{$pedido->valor_total}}</p>
                        </div>
                        <div class="card-footer">
                            <a href=""><button class="btn btn-success">Detalhes</button><br></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <hr class="mt-3 mb-3">
    </div>
</div>
@endsection
