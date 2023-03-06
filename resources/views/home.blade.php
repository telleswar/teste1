@extends('layouts.app-nav-cidade')

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
            max-width: 350px;
            overflow: hidden;
        }

        .card img{
            border-radius: 10px;
            /* object-fit: cover; */
            transition: all 1.5s ease-in-out;
        }

        .card img:hover{
            transform: scale(1.35) rotateZ(5deg);
        }

        .card .img{
            align-items: center;
            min-width: 180px;
            max-width: 350px;
            max-height: 420px;
            object-fit: cover;
            overflow: hidden;
        }

    </style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mt-5">
            <h3>Filmes em cartaz</h3>
            <hr class="mt-3">
        </div>

        <div class="row text-center">
            @foreach ($Filmes as $filme)
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 d-flex ms-sm-0 ms-2 align-items-stretch">
                    <div class="card bg-dark">
                        <small class="position-absolute top-0 start-0 text-secundary border border-warning bg-warning rounded" >{{$filme->classificacao}}</small>
                        <div class="img card-img-top"><img class="card-img-top" src="{{url("storage/$filme->capa")}}" alt="Capa"></div>
                        <div class="card-header">
                            <h2>{{$filme->titulo}}</h2>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{$filme->categorias}}</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{Route('filmes.show',['filme'=>$filme->id])}}"><button class="btn btn-success">Detalhes</button><br></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <hr class="mt-3 mb-3">
    </div>
</div>
@endsection
