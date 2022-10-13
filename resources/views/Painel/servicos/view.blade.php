@extends('layouts.app') @section('content')

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <h2>Visualizar Serviço</h2>

            </div>
        </div>

        @csrf
        <div class="row">
            <div class="form-group col-md-12">
                <b>Nome do servico:</b><br /> <label>{{$servico->titulo}}</label>
            </div>
        </div>

        <div class="row">

            <div class="form-group col-md-5">
                <b>Criado:</b><br /> <label>{{$servico->data_criacao}}</label>
            </div>

            <div class="form-group col-md-5">
                <b>Ultima Alteração:</b><br /> <label>{{$servico->data_update}}</label>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-12">
                <strong>Descrição do serviço: </strong>
                {!!$servico->descricao!!}
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-12">
                <strong>Legislação do serviço: </strong>
                {!!$servico->legislacao!!}
            </div>
        </div>
        <div class="row">

            <div class="form-group col-md-5">
                <strong>Fotos do servico: </strong>
                <BR />
                @foreach( $imagens as $img )
                <a href="{{ asset("storage/servicos/{$img->imagem}") }}" target="_blank">
                    <img src="{{ asset("storage/servicos/{$img->imagem}") }}" alt="{{$img->nome }}" height="100px">
                </a>

                @endforeach
            </div>
        </div>

        <div class="row">
            <div class="col-md-3"></div>
            <div class="form-group col-md-4" style="margin-top: 60px">
                <div class="btn-group">
                    <a href="../editar/{{$servico->id}}" title="Editar" class="btn btn-sm icons-index icons-bg"><i class="fa-solid fa-pencil"></i></a>
                    <form action="servicos/{{$servico->id}}/delete/" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button class="btn btn-danger btn-sm icons-index-deletar icons-bg" title="Deletar" type="submit"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </div>
            </div>
        </div>

    </div>

</body>
@endsection
