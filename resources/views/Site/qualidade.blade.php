@extends('layouts.Site.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-7 col-md-7 col-lg-7 col-xs-12">
            <div class="parent">
                <img class="d-inline" src="{{asset("storage/icons/f2-1.png")}}">
                <h2 class="d-inline p-2 negrito">{{$texto->titulo}}</h2>
            </div>
            <p class="texto">{!!$texto->descricao!!}</p>
            @foreach ($certificados as $certificado)
            
            <img src="{{ asset("storage/certificados/{$certificado->imagem}") }}" class=" d-inline w-25">

            @endforeach
        </div>

        <div class="col-sm-5 col-md-5 col-lg-5 col-xs-12">
            <img class="d-inline foto-lab" src="{{asset("storage/fotos2/pngegg.png")}}">
        </div>
        <div class="col-sm-7 col-md-7 col-lg-7 col-xs-12">

        </div>
    </div>

    <p class="quebra"></p>
</div>
<br>


@endsection