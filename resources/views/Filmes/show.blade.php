@extends('layouts.app-nav-cidade')

@section('head')
    <style>

        .capa{
            width: 280px;
            height: 45vh;
            border-radius: 10px;
            overflow: hidden;
        }

        .capa img{
            width: 280px;
            height: 45vh;
            object-fit: cover;
            overflow: hidden;
            border-radius: 10px;
            transition: all 1.5s ease-in-out;
        }

        .capa img:hover{
            transform: scale(1.35) rotateZ(5deg);
        }

        .titulo h2{
            padding-left: 42px;
            padding-top: 42px;
            font-weight: bold;
            background-image: linear-gradient(45deg, rgb(37, 201, 223), rgb(0, 202, 91))!important;
            background-clip: text !important;
            color: transparent !important;
        }

        .info {
            padding-top: 32px;
            padding-bottom: 32px;
            padding-left: 32px;
        }

        .info p {
            width: 32px;
            color: white;
            font-weight: 800;
            font-size: bold !important;
        }

        .info label{
            font-size: 14px;
            padding-bottom: 8px;
        }

        .sessoes p{
            font-size: 12px;
        }

        .sessoes label{
            width: 32px;
            color: white;
            font-weight: 800;
            font-size: bold !important;
        }

        .sessoes {
            border-radius: 10px;
            margin-bottom: 20px;
            padding: 16px;

        }
        .sessoes .row{


        }

        .sessoes h6{
            text-decoration: underline;
            margin-top: 8px;
        }

    </style>
@endsection

@section('content')
<div class="container main">
    <div class="row justify-content-center" >
        <div class="col-12 my-3 capa">
            <img class="fluid-img" id="capa" src="{{url("storage/$filme->capa")}}" alt="Capa">
        </div>
        <div class="col dados">
            <div class="row titulo">
                <h2>{{$filme->titulo}}</h2>
            </div>

            <div class="row d-flex info">
                <div class="col">
                    <label for="class">Classificação</label>
                    <p class="border border-warning bg-warning rounded" id="class">{{$filme->classificacao}}</p>
                </div>

                <div class="col">
                    <label for="lanc">Lançamento</label>
                    <p  id="lanc">{{$filme->ano_lanc}}</p>
                </div>

                <div class="col-8 col-md-6">
                    <label for="cat">Categorias</label>
                    <p class="text-justify" id="cat">{{$filme->categorias}}</p>
                </div>
            </div>
        </div>
    </div>
    @foreach ($Cinemas as $cinema)
        <div class="container justify-content-left sessoes">
            <div class="row">
                <label for="cinema">{{$cinema->nome}}</label>
                <p id="cinema">{{$cinema->endereco.' - '.$cinema->cidade->nome}}</p>
                <hr>
            </div>
            <div class="row">
                @php
                    $id_sala_ant = -1;
                @endphp
                @foreach ($cinema->sessoes->where('id_filme',$filme->id)->sortBy('id_sala') as $sessao)
                    @if ($sessao->id_sala !== $id_sala_ant)
                        @if ($id_sala_ant >= 0)
                            </div>
                        @endif
                       <div class="row d-flex">
                            <h6>{{$sessao->sala->nome_sala}}</h6>
                       </div>
                       <div class="d-grid gap-2 d-md-block">
                    @endif
                        <a href="{{Route('recibos.create',['sessao'=>$sessao->id])}}"><button class="btn btn-primary">{{$sessao->data.'/'.$sessao->hora_inicio.'/'.$sessao->tipo}}</button>
                    @php
                        $id_sala_ant = $sessao->id_sala;
                    @endphp
                @endforeach
                @if ($id_sala_ant >= 0)
                    </div>
                @endif
            </div>
        </div>
    @endforeach
</div>

@endsection
