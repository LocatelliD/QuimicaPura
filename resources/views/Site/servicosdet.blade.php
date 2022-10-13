@extends('layouts.Site.app')
@section('content')

<div class="container">

    <div class="row" style=" margin-top: 4% !important; margin-bottom: 5%;">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 ">
            <h2 class="p-4 negrito" style="text-align: center;">{{$info->titulo}}</h2>
            <p class="texto">{!! $info->descricao !!}</p>
        </div>
    </div>

    <div class="row" style=" margin-top: 4% !important; margin-bottom: 5%;">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 ">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">

                    @foreach ($galerias as $key => $galeria)
                    @if ($key == 0)
                    <div class="carousel-item active">
                        <img src="{{ asset("storage/fotos/{$galeria->imagem}") }}" class="d-block  foto_conheca">

                    </div>
                    @else
                    <div class="carousel-item ">
                        <img src="{{ asset("storage/fotos/{$galeria->imagem}") }}" class="d-block  foto_conheca">
                    </div>
                    @endif
                    @endforeach

                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</div>
    <div class="container-fluid" style="background-color: #fffafa;">
        <div class="container">
            <div class="row" style=" margin-top: 4% !important; margin-bottom: 5%;">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 ">

                    <p class="texto">{!! $info->legislacao !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection