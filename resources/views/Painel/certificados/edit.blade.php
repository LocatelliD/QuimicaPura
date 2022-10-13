@extends('layouts.app') @section('content')

    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <h2>Editar Certificado</h2>
                </div>
            </div>
            <form method="post" action="../editar/{{ $certificado->id }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="form-group col-md-6">
                        <strong>Certificado:</strong>
                        <input type="text" class="form-control" name="titulo" value="{{ $certificado->titulo }}">

                        @if ($errors->has('titulo'))
                            <div class="alert alert-danger">
                                <strong>{{ $errors->first('titulo') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="form-group col-md-6">
                        <strong>Imagem:</strong>
                        <input type="file" name="imagem" id="imagem">
                        @if ($errors->has('imagem'))
                            <div class="alert alert-danger">
                                <strong>{{ $errors->first('imagem') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4" style="margin-top: 60px">
                        <button type="submit" class="btn btn-success">CONFIRMAR EDIÇÃO</button>
                    </div>
                </div>
        </div>
        </form>
        </div>

    </body>
@endsection
