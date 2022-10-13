@extends('layouts.Site.app')
@section('content')
    <div class="container">
        <div class="row" style=" margin-top: 4% !important; ">
            <div class="parent" style="margin-bottom: 2%;">
                <img class="d-inline" src="{{ asset('storage/icons/f2.png') }}">
                <h2 class="d-inline p-2 negrito">{{ $texto->titulo }}</h2>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">

                <p class="texto">{!! $texto->descricao !!}</p>
            </div>
        </div>
        <div class="row" style=" margin-top: 4% !important; margin-bottom: 5%;">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($galerias as $key => $galeria)
                            @if ($key == 1)
                                <div class="carousel-item active">
                                    <img src="{{ asset("storage/fotos/{$galeria->imagem}") }}"
                                        class="d-block  foto_conheca">

                                </div>
                            @else
                                <div class="carousel-item">
                                    <img src="{{ asset("storage/fotos/{$galeria->imagem}") }}"
                                        class="d-block  foto_conheca">
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
