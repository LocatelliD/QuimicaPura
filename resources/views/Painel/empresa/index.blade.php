@extends('layouts.app') @section('content')
    <div class="col-md-10">
        <div class="container">
            <nav class="navbar navbar">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <h2>Empresa</h2>
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
                        <th>Nome</th>
                        <th>Data de Alteração</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($empresa as $dado)
                        <tr>
                            <td>
                                <div class="btn-group">
                                    <a href="empresa/view/{{ $dado->id }}" title="Visualizar"
                                        class="btn btn-sm icons-index"><i class="fa-solid fa-eye"></i></a>
                                    <a href="empresa/editar/{{ $dado->id }}" title="Editar"
                                        class="btn btn-sm icons-index"><i class="fa-solid fa-pencil"></i></a>
                                </div>
                            </td>
                            <td class="text-center">{{ $dado->nome }}</td>
                            <td>{{ $dado->data_alterada }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
