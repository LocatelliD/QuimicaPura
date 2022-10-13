@extends('layouts.app') @section('content')
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <h2 style="">Visualizar Categorias de Produto</h2>
            </div>
        </div>

        @csrf
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <b>Categoria:</b><br /> <label>{{$categoria->categoria}}</label>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <b>Produtos dessa Categoria:</b><br />
                @if ($produtos !== '')
                @foreach ($produtos as $produto)
                <label>{{$produto->name}}</label><BR />
                @endforeach

                @else
                <label>Não exite produto vinculado a esta categoria</label>
                @endif
            </div>
        </div>



        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4" style="margin-top: 60px">
                <div class="btn-group">
                    <a href="../editar/{{$categoria->id}}" class="btn btn-warning btn-sm">Editar</a>
<!--                    <form action="../{{$categoria->id}}/delete/" method="POST">
                        <input type="hidden" name="_method" value="DELETE"> 
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                    </form>-->
                </div>
            </div>
        </div>

    </div>

</body>
@endsection
