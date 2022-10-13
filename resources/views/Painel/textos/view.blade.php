@extends('layouts.app') @section('content')

    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <h2>Visualizar Texto</h2>

                </div>
            </div>

            @csrf
            <div class="row">
                <div class="form-group col-md-12">
                    <b>Nome do texto:</b><br /> <label>{{ $texto->titulo }}</label>
                </div>
            </div>

            <div class="row">

                <div class="form-group col-md-5">
                    <b>Criado:</b><br /> <label>{{ $texto->data_criacao }}</label>
                </div>

                <div class="form-group col-md-5">
                    <b>Ultima Alteração:</b><br /> <label>{{ $texto->data_update }}</label>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-12">
                    <strong>Descrição do texto: </strong><br />
                    {!! $texto->descricao !!}
                </div>
            </div>

            <div class="row">

                <div class="form-group col-md-5">
                    <strong>Fotos do texto: </strong>
                    <BR />
                    @foreach ($imagens as $img)
                        <a href="{{ asset("storage/fotos2/{$img->arquivo}") }}" target="_blank">
                            <img src="{{ asset("storage/fotos2/{$img->arquivo}") }}" alt="{{ $img->nome }}"
                                height="100px">
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="row">
                <div class="col-md-3"></div>
                <div class="form-group col-md-4" style="margin-top: 60px">
                    <div class="btn-group">
                        <a href="../editar/{{ $texto->id }}" title="Editar" class="btn btn-sm icons-index icons-bg"><i
                                class="fa-solid fa-pencil"></i></a>
                        {{-- <form action="textos/{{$texto->id}}/delete/" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button class="btn btn-danger btn-sm icons-index-deletar icons-bg" title="Deletar" type="submit"><i class="fa-solid fa-trash"></i></button>
                    </form> --}}
                    </div>
                </div>
            </div>

        </div>

    </body>
@endsection
