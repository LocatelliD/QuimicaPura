@extends('layouts.app') @section('content')
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <h2 style="">Visualizar</h2>

            </div>
        </div>

        @csrf
        <div class="row">
            <div class="form-group col-md-5">
                <b>Nome:</b><br /> <label>{{$contato->nome}}</label>
            </div>

            <div class="form-group col-md-5">
                <b>Endereço:</b><br /> <label>{{$contato->endereco}}</label>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-5">
                <b>Bairro / Cep:</b><br /> <label>{{$contato->bairro}} / {{$contato->cep}}</label>
            </div>

            <div class="form-group col-md-5">
                <b>Cidade / Estado :</b><br /> <label>{{$contato->cidade}} / {{$contato->estado}}</label>
            </div>
        </div>



        <div class="row">
            <div class="form-group col-md-5">
                <b>Telefone:</b><br /> <label>{{$contato->telefone}}</label>
            </div>

            <div class="form-group col-md-5">
                <b>Telefone 2:</b><br /> <label>{{$contato->telefone_2}}</label>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-5">
                <b>Latitude:</b><br /> <label>{{$contato->cod_latitude}}</label>
            </div>

            <div class="form-group col-md-5">
                <b>Longitude:</b><br /> <label>{{$contato->cod_longitude}}</label>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-5">
                <b>Facebook:</b><br /> <label>{{$contato->link_facebook}}</label>
            </div>

            <div class="form-group col-md-5">
                <b>LinkedIn:</b><br /> <label>{{$contato->link_linkedin}}</label>
            </div>

            <div class="form-group col-md-5">
                <b>Twitter:</b><br /> <label>{{$contato->link_twitter}}</label>
            </div>
        </div>


        <div class="row">

            <div class="form-group col-md-5">
                <strong>Logo: </strong> 
                <BR />
                <a href="{{ asset("storage/endereco_site/{$contato->img_logo}") }}" target="_blank" >
                    <img src="{{ asset("storage/endereco_site/{$contato->img_logo}") }}" height="100px">
                </a>
            </div>
            <div class="form-group col-md-5">
                <strong>Icone: </strong> 
                <BR />
                <a href="{{ asset("storage/endereco_site/{$contato->img_icone}") }}" target="_blank" >
                    <img src="{{ asset("storage/endereco_site/{$contato->img_icone}") }}" height="100px">
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-4" style="margin-top: 60px">
                <div class="btn-group">
                    <a href="../editar/{{$contato->id}}" class="btn btn-warning btn-sm">Editar</a>

                </div>
            </div>
        </div>
    </div>

</body>
@endsection
