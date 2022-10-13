@extends('layouts.app') @section('content')
    <div class="col-md-10">
        <div class="container">
            <nav class="navbar navbar">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <h2>Textos listados</h2>
                    </div>
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
                        <th>Titulo</th>
                        <th>Data de Alteração</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($textos as $dado)
                        <tr>
                            <td>
                                <div class="btn-group">
                                    <a href="textos/view/{{ $dado->id }}" title="Visualizar" class="btn btn-sm icons-index"><i class="fa-solid fa-eye"></i></a>
                                    <a href="textos/galeria/{{ $dado->id }}"title="Galeria" class="btn btn-sm icons-index"><i class="fa-solid fa-images"></i></a>
                                    <a href="textos/editar/{{ $dado->id }}" title="Editar"   class="btn btn-sm icons-index"><i class="fa-solid fa-pencil"></i></a>
                                    {{-- <form action="textos/{{ $dado->id }}/delete/" method="POST">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button class="btn btn-danger btn-sm icons-index-deletar" title="Deletar"
                                            type="submit"><i class="fa-solid fa-trash"></i></button>
                                    </form> --}}
                                </div>
                            </td>
                            <td class="text-center">{{ $dado->titulo }}</td>
                            <td>{{ $dado->data_alterada }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
