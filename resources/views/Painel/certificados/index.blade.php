@extends('layouts.app') @section('content')
    <div class="col-md-10">
        <div class="container">
            <nav class="navbar navbar">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <h2>Certificados listados</h2>
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                        <a href="certificados/create" class="btn btn-sm icons-index" title="Adcionar Certificados"><i
                                class="fa-solid fa-plus"></i></a>
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
                        <th>Certificado</th>
                        <th>Imagem</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dados as $dado)
                        <tr>
                            <td>
                                <div class="btn-group">
                                    <a href="certificados/editar/{{ $dado->id }}" title="Editar"
                                        class="btn btn-sm icons-index"><i class="fa-solid fa-pencil"></i></a>
                                    <form action="certificados/{{ $dado->id }}/delete/" method="POST">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button class="btn btn-danger btn-sm icons-index-deletar" title="Deletar"
                                            type="submit"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                            <td>{{ $dado->titulo }}</td>
                            <td>
                                <a href="{{ asset("storage/certificados/{$dado->imagem}") }}" target="_blank">
                                    <img src="{{ asset("storage/certificados/{$dado->imagem}") }}"
                                        alt="{{ $dado->titulo }}" height="100px">
                                </a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
