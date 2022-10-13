@extends('layouts.app') @section('content')
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <h2 style="">Editar</h2>
            </div>
        </div>
        <form method="post" action="../editar/{{ $contato->id }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-md-4">
                    <strong>Nome: </strong>
                    <input type="text"	class="form-control" name="nome" value="{{$contato->nome}}">
                    @if ($errors->has('nome'))
                    <div class="alert alert-danger">
                        <strong>{{ $errors->first('nome')}}</strong>
                    </div>
                    @endif
                </div>
                <div class="form-group col-md-4">
                    <strong>Endereço: </strong>
                    <input type="text"	class="form-control" name="endereco" value="{{$contato->endereco}}">
                    @if ($errors->has('endereco'))
                    <div class="alert alert-danger">
                        <strong>{{ $errors->first('endereco')}}</strong>
                    </div>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-4">   
                    <strong>Bairro: </strong> 
                    <input type="text"	class="form-control" name="bairro" value="{{$contato->bairro}}">
                    @if ($errors->has('bairro'))
                    <div class="alert alert-danger">
                        <strong>{{ $errors->first('bairro')}}</strong>
                    </div>
                    @endif
                </div>
                <div class="form-group col-md-4">   
                    <strong>Cep: </strong> 
                    <input type="text"	class="form-control" name="cep" value="{{$contato->cep}}">
                    @if ($errors->has('cep'))
                    <div class="alert alert-danger">
                        <strong>{{ $errors->first('cep')}}</strong>
                    </div>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-4">   
                    <strong>Cidade: </strong> 
                    <input type="text"	class="form-control" name="cidade" value="{{$contato->cidade}}">
                    @if ($errors->has('cidade'))
                    <div class="alert alert-danger">
                        <strong>{{ $errors->first('cidade')}}</strong>
                    </div>
                    @endif
                </div>
                <div class="form-group col-md-4">   
                    <strong>Estado: </strong> 
                    <input type="text"	class="form-control" name="estado" value="{{$contato->estado}}">
                    @if ($errors->has('estado'))
                    <div class="alert alert-danger">
                        <strong>{{ $errors->first('estado')}}</strong>
                    </div>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-4">   
                    <strong>Telefone: </strong> 
                    <input type="text"	class="form-control" name="telefone" value="{{$contato->telefone}}">
                    @if ($errors->has('telefone'))
                    <div class="alert alert-danger">
                        <strong>{{ $errors->first('telefone')}}</strong>
                    </div>
                    @endif
                </div>
                <div class="form-group col-md-4">   
                    <strong>Telefone_2: </strong> 
                    <input type="text"	class="form-control" name="telefone_2" value="{{$contato->telefone_2}}">
                    @if ($errors->has('telefone_2'))
                    <div class="alert alert-danger">
                        <strong>{{ $errors->first('telefone_2')}}</strong>
                    </div>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-4">   
                    <strong>Latitude: </strong> 
                    <input type="text"	class="form-control" name="latitude" value="{{$contato->cod_latitude}}">
                    @if ($errors->has('latitude'))
                    <div class="alert alert-danger">
                        <strong>{{ $errors->first('latitude')}}</strong>
                    </div>
                    @endif
                </div>
                <div class="form-group col-md-4">   
                    <strong>Longitude: </strong> 
                    <input type="text"	class="form-control" name="longitude" value="{{$contato->cod_longitude}}">
                    @if ($errors->has('longitude'))
                    <div class="alert alert-danger">
                        <strong>{{ $errors->first('longitude')}}</strong>
                    </div>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-md-3"></div>
                <div class="form-group col-md-4" style="margin-top: 60px">
                    <button type="submit" class="btn btn-success">Editar</button>
                </div>
            </div>
        </form>
    </div>
</body>
@endsection
