@extends('layouts.Site.app')
@section('content')
    <div class="container">
        <div class="row" style=" margin-top: 4% !important; margin-bottom: 5%;">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                <div class="parent">
                    <img class="d-inline" src="{{ asset('storage/icons/f3.png') }}">
                    <h2 class="d-inline p-2 negrito">{{ $texto->titulo }}</h2>
                </div>

                <p class="texto">{!! $texto->descricao !!}</p>


            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="container">
            @foreach ($servicos as $key => $servico)
                <div class="row" style=" margin-top: 4% !important; margin-bottom: 5%;">

                    <h2 class=" p-4 negrito" style="text-align: center;">{{ $servico->titulo }}</h2>
                    <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12 ">
                        <p class="texto">{!! substr($servico->descricao, 0, 400) !!} ...</p>
                        <div class="parent">
                            <a class="btn btn-primary Btnblue" href="{{ url('/') }}/servicos/{{ $servico->link }}"
                                role="button">Saiba Mais</a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                        <div class="parent justify-content-end">
                            <img src="{{ asset("storage/fotos/{$servico->galeria->imagem}") }}"
                                class="d-inline foto_servicos">
                        </div>
                    </div>
                </div>
           @endforeach
        </div>
    </div>
@endsection
