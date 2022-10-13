@extends('layouts.Site.app')
@section('content')
    <div class="container-fluid" style="border: 10px black; border-style:outset">
        <div class="container">
            <div class="row" style="margin-top:5%; margin-bottom:3% ;">
                <div class="col-sm-5 col-md-5 col-lg-5 col-xs-12">
                    <img class="d-inline foto-lab" src="{{ asset("storage/fotos2/{$lab_img->arquivo}") }}">
                </div>
                <div class="col-sm-7 col-md-7 col-lg-7 col-xs-12">
                    <div class="parent">
                        <img class="d-inline" src="{{ asset('storage/icons/f3.png') }}">
                        <h2 class="d-inline p-2 negrito">{{ $texto_lab->titulo }}</h2>
                    </div>
                    <p class="texto" style="">{{ $texto_lab->descricao }}</p>
                    <div class="parent">
                        <a class="btn btn-primary Btnblue" href="quimicapura" role="button">CONHEÇA O LABORATÓRIO</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" style="background-color: #e1dede;">
        <div class="row" style="padding-top: 3% !important">

            <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                <div class="parent">
                    <img class="d-inline" src="{{ asset('storage/icons/f3.png') }}">
                    <h2 class="d-inline p-2 negrito">{{ $texto_servico->titulo }}</h2>
                </div>
            </div>
        </div>
        <div class="row" style=" margin-top: 4% !important;">
            @foreach ($servicos as $key => $servico)
                {{-- @if ($key == 3)
                    <div class="row" style="margin-top: 4%;"> </div>
                @endif --}}
                <div class="col-sm-6 col-md-6 col-lg-4 col-xs-12 ">
                    <a href="{{ url('/') }}/servicos/{{ $servico->link }}" style="color:#000000">
                        <h3 style="text-align: center;" class="negrito">{{ $servico->titulo }}</h3>
                        <div class="parent">
                            <img src="{{ asset("storage/servicos/{$servico->galeria->imagem}") }}" class="foto_index">
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    </div>
@endsection
