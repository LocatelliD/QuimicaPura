@extends('layouts.app')
@section('content')
    <meta name="_token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @else
            <div class="alert alert-error">{{ session('error') }}</div>
        @endif

        <H2 style="text-align:center"> GALERIA DE FOTOS </H2>
        <H2 style="text-align:center">{{ $textos->titulo }}</H2>
        <form method="post" action="{{ url('painel/textos/upload/store') }}" enctype="multipart/form-data" class="dropzone" id="dropzone">

            <div class="dz-message" data-dz-message><span>Clique ou arraste sua foto!</span></div>
            <input type="hidden" id="codigo" name="codigo" value="{{ $textos->id }}">
            <input type="hidden" id="nome" name="nome" value="{{ $textos->titulo }}">
            @csrf
        </form>
        <script type="text/javascript">
            Dropzone.options.dropzone = {
                maxFilesize: 12,
                renameFile: function(file) {
                    var dt = new Date();
                    var time = dt.getTime();
                    return time + file.name;
                },
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                addRemoveLinks: true,
                timeout: 50000,
                removedfile: function(file) {
                    var name = file.upload.filename;
                    var codigo = $('#codigo').val();
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        },
                        type: 'POST',
                        url: '{{ url('painel/textos/delete') }}',
                        data: {
                            filename: name,
                            codigo: codigo
                        },
                        success: function(data) {
                            console.log("File has been successfully removed!!");
                        },
                        error: function(e) {
                            console.log(e);
                        }
                    });
                    var fileRef;
                    return (fileRef = file.previewElement) != null ?
                        fileRef.parentNode.removeChild(file.previewElement) : void 0;
                },
                success: function(file, response) {
                    console.log(response);
                },
                error: function(file, response) {
                    return false;
                }
            };
        </script>
        <div class="row"><br><br>
        </div>

        <b>Fotos:</b><br />
        <div class="row">
            @foreach ($images as $test)
                <div class="col-md-3">
                    <div class="thumbnail">
                        <a href="{{ asset("storage/fotos2/{$test->arquivo}") }}" target="_blank">
                            <img src="{{ asset("storage/fotos2/{$test->arquivo} ") }} " width="100" height="100">

                        </a>
                        <form action="../{{ $test->id }}/deleteFoto/" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button class="btn btn-link" type="submit">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    </div>

    </body>

    </html>
@endsection
