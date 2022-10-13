@extends('layouts.app') @section('content')

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <h2>Inserir Serviço</h2>
            </div>
        </div>

        <form method="post" action="{{url('painel/servicos/create')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-2"></div>
                <div class="form-group col-md-6">
                    <strong>Titulo:</strong>
                    <input type="text" class="form-control" name="titulo" value="{{old('titulo')}}">
                    @if($errors->has('titulo'))
                    <div class="alert alert-danger">
                        <strong>{{ $errors->first('titulo')}}</strong>
                    </div>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-md-2"></div>
                <div class="form-group col-md-6">
                    <strong>Descrição: </strong>
                    <textarea class="form-control" rows="5" id="descricao" name="descricao">{{old('descricao')}}</textarea>
                    @if ($errors->has('descricao'))
                    <div class="alert alert-danger">
                        <strong>{{ $errors->first('descricao') }}</strong>
                    </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="form-group col-md-6">
                    <strong>Legislação: </strong>
                    <textarea class="form-control" rows="5" id="legislacao" name="legislacao">{{old('legislacao')}}</textarea>
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
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
            </div>
        </form>
    </div>
</body>
@endsection