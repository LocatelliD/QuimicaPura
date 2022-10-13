@extends('layouts.app') @section('content')
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <h2 style="">Editar Categoria</h2>
            </div>
        </div>
        <form method="post" action="../editar/{{ $categoria->id }}"
              enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-2"></div>
                <div class="form-group col-md-6">
                    <strong>Categoria do Produto:</strong> 
                    <input type="text" class="form-control" name="categoria" value="{{$categoria->categoria}}"> 
                    @if ($errors->has('categoria'))
                    <div class="alert alert-danger">
                        <strong>{{ $errors->first('categoria')}}</strong>
                    </div>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4" style="margin-top: 60px">
                    <button type="submit" class="btn btn-success">Editar</button>
                </div>
            </div>

    </div>


</form>
</div>

</body>
@endsection
