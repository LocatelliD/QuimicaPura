@extends('layouts.app') @section('content')

<div class="col-md-10">
    <div class="container">
        <nav class="navbar navbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <h2>Serviços listados</h2>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <a href="servicos/create" class="btn btn-sm icons-index" title="Adcionar Serviços"><i class="fa-solid fa-plus"></i></a>
                </ul>
            </div>
        </nav>

        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @else
        <div class="alert alert-error">{{ session('error') }}</div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th>Produto</th>
                    <th>Data de Alteração</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dados as $dado)
                <tr>
                    <td>
                        <div class="btn-group">
                            <a href="servicos/view/{{ $dado->id }}" title="Visualizar" class="btn btn-sm icons-index"><i class="fa-solid fa-eye"></i></a>
                            <a href="servicos/galeria/{{ $dado->id }}" title="Galeria" class="btn btn-sm icons-index"><i class="fa-solid fa-images"></i></a>
                            <a href="servicos/editar/{{ $dado->id }}" title="Editar" class="btn btn-sm icons-index"><i class="fa-solid fa-pencil"></i></a>
                            <form action="servicos/{{$dado->id}}/delete/" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button class="btn btn-danger btn-sm icons-index-deletar" title="Deletar" type="submit"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                    <td>{{$dado->titulo}}</td>
                    <td>{{$dado->data_alterada}}</td>

                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection