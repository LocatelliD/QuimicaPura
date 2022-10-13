@extends('layouts.app') @section('content')

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <h2>Editar Serviço</h2>
            </div>
        </div>
        <form method="post" action="../editar/{{ $servico->id }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-2"></div>
                <div class="form-group col-md-6">
                    <strong>Nome:</strong>
                    <input type="text" class="form-control" name="titulo" value="{{$servico->titulo}}">

                    @if ($errors->has('titulo'))
                    <div class="alert alert-danger">
                        <strong>{{ $errors->first('titulo')}}</strong>
                    </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="form-group col-md-12">
                    <strong>Descrição: </strong>
                    <textarea class="form-control" id="descricao" rows="10" name="descricao">{{$servico->descricao}}</textarea>
                    @if ($errors->has('descricao'))
                    <div class="alert alert-danger">
                        <strong>{{ $errors->first('descricao') }}</strong>
                    </div>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-md-2"></div>
                <div class="form-group col-md-12">
                    <strong>Legislação: </strong>
                    <textarea class="form-control" id="legislacao" rows="10" name="legislacao">{{$servico->legislacao}}</textarea>
                    @if ($errors->has('legislacao'))
                    <div class="alert alert-danger">
                        <strong>{{ $errors->first('legislacao') }}</strong>
                    </div>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4" style="margin-top: 60px">
                    <button type="submit" class="btn btn-success">CONFIRMAR EDIÇÃO</button>
                </div>
            </div>
    </div>
    </form>
    </div>

</body>
@endsection