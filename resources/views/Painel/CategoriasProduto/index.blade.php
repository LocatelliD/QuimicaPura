@extends('layouts.app') @section('content')

<div class="col-md-10">
    <div class="container">
        <nav class="navbar navbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <h2>Categorias de Produtos listadas</h2>
                </div>
<!--                <ul class="nav navbar-nav navbar-right">
                    <a href="categorias/create" class="btn btn-info btn-sm">Nova Categoria</a>
                </ul>-->
            </div>
        </nav>
        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @else
        <div class="alert alert-error">{{ session('error') }}</div>
        @endif

        <table class="table table-striped task-table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Categoria</th>
                    <th colspan="5">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dados as $categoria)
                <tr>
                    <td>{{$categoria->id}}</td>
                    <td>{{$categoria->categoria}}</td>
                    <td>
                        <div class="btn-group">

                            <a href="categorias/view/{{ $categoria->id }}"class="btn btn-info btn-sm">ver</a>
                            <a href="categorias/editar/{{ $categoria->id }}" class="btn btn-info btn-sm">Editar</a>

<!--                            <form action="categorias/{{$categoria->id}}/delete/" method="POST">
                                <input type="hidden" name="_method" value="DELETE"> 
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>

                            </form>-->
                        </div>
                    </td>
                </tr>          
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection


