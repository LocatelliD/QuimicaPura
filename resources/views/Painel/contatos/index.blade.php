@extends('layouts.app') 
@section('content')

<div class="col-md-10">
    <div class="container">
        <nav class="navbar navbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <h2>Contato</h2>
                </div>
              
            </div>
        </nav>
        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @else
        <div class="alert alert-error">{{ session('error') }}</div>
        @endif

        <table class="table table-striped task-table">
            <thead>
                <tr class="text-center">
                    <th>Nome</th>

                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contatos as $cont)
                <tr class="text-center">
                    <td>{{$cont->nome}}</td>

                    <td>
                        <div class="btn-group">
                            <a href="contatos/view/{{ $cont->id }}"	class="btn btn-info btn-sm"><i class="fa-solid fa-pencil"></i></a>
                            <a href="contatos/editar/{{ $cont->id }}"	class="btn btn-info btn-sm">Editar</a>
                           
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection


