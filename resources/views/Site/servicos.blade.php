@extends('layouts.Site.app')
@section('content')

<div class="container">

    <div class="row" style=" margin-top: 4% !important; margin-bottom: 5%;">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
            <div class="parent">
                <img class="d-inline" src="{{ asset('storage/icons/f3.png') }}">
                <h2 class="d-inline p-2 negrito">{{$texto->titulo}}</h2>
            </div>

            <p class="texto">{!! $texto->descricao !!}</p>


        </div>
    </div>



    <div class="row" style=" margin-top: 4% !important; margin-bottom: 5%;">
        @foreach ($servicos as $key => $servico)
        @if ($key == 3)
        <div class="row" style="margin-top: 4%;"> </div>
        @endif
        <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12 ">
            <a href="{{ url('/')}}/servicos/{{$servico->link}}" style="color:#000000">
                <h3 style="text-align: center;" class="negrito">{{ $servico->titulo }}</h3>
                <div class="parent">
                    <img src="{{ asset("storage/fotos/{$servico->galeria->imagem}") }}" class="foto_index">
                </div>
            </a>
        </div>
        @endforeach

    </div>
</div>
@endsection