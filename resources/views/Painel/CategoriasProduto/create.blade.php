@extends('layouts.app') @section('content')
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="form-group col-md-5">
                <h2 style="">Inserir Categoria de produto</h2>
            </div>
        </div>
        <form method="post" action="{{url('painel/categorias/create')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-2"></div>
                <div class="form-group col-md-6">
                    <strong>Categoria:</strong> 
                    <input type="text" class="form-control" name="categoria" value="{{old('categoria')}}">
                    @if($errors->has('categoria'))
                    <div class="alert alert-danger">
                        <strong>{{ $errors->first('categoria') }}</strong>
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
