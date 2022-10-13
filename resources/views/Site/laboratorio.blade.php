@extends('layouts.Site.app')
@section('content')
<div class="container" style="margin-top: 4%;">
    <div class="row">

        <div class="col-sm-5 col-md-5 col-lg-5 col-xs-12">
            <img class="d-inline foto-lab" src="{{asset("storage/fotos2/testelab.png")}}">
        </div>
        <div class="col-sm-1 col-md-1 col-lg-1 col-xs-12">

        </div>
        <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
            <div class="parent" style="background-color: aliceblue">
                <img class="d-inline" src="{{asset("storage/icons/f3-1.png")}}">
                <h2 class="d-inline p-2 font-texto">{{$texto->titulo}}</h2>
            </div>
            <p class="texto">{!!$texto->descricao!!}</p>
            <div class="parent">
                <a class="btn btn-primary Btnblue" href="quimicapura" role="button">CONHEÇA O LABORATÓRIO</a>
            </div>
        </div>
    </div>

    <p class="quebra"></p>

    <div class="row">


    </div>
</div><br>

@endsection