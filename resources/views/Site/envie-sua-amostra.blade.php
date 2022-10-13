@extends('layouts.Site.app')
@section('content')
    <div class="container">


        <div class="row" style=" margin-top: 4% !important; margin-bottom: 5%;">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" style="margin-top: 4%;">
                <div class="parent">
                    <img class="d-inline" src="{{ asset('storage/icons/f3.png') }}">
                    <h2 class="d-inline p-2 negrito">{{ $texto->titulo }}</h2>
                </div>
                <p class="texto">{!! $texto->descricao !!}</p>
            </div>
        </div>



        <div class="row" style=" margin-top: 4% !important; margin-bottom: 5%;">

            <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                <h3 class="p-4 negrito" style="text-align: center;">Solicite seu orçamento</h3>
                <div class="alert alert-danger" style="display:none"></div>
                <div class="alert alert-success" style="display:none"></div>
                <form class="row g-3" method="POST" id="ajax-form">
                    {{ csrf_field() }}
                    <meta name="_token" content="{{ csrf_token() }}" />
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Seu nome">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Seu e-mail">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="empresa" name="empresa" placeholder="Sua empresa">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control  cpfcnpj" id="cnpj" name="cnpj" placeholder="CPF/CNPJ">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control fone" id="telefone" name="telefone"
                            placeholder="Seu telefone">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Sua cidade">
                    </div>

                    <div class="col-md-12">
                        <textarea class="form-control" id="mensagem" rows="4" id="mensagem" name="mensagem" placeholder="Sua mensagem">
                                                    </textarea>
                    </div>
                    <div class="col-12 parent">
                        <button class="btn btn-primary Btnblue" id="submit">SOLICITAR ORÇAMENTO</button>
                    </div>
                </form>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12 ">
                <h3 class="p-4 negrito" style="text-align: center;">Formulário de solicitação de análise</h3>

                <div class="row caixa_amostra">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                        <a href="{{ asset('storage/documentos/RQ029.docx') }}"
                            download="RQ029 - Formulário de Solicitação de Análise - Alimentos e outros.docx">
                            <img class="icons-download rounded mx-auto d-block mt-2"
                                src="{{ asset('storage/icons/download-icon.png') }}">
                        </a>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                        <p class="titlecaixaamotra">Formulário de solicitação de análise - Alimentos e outros</p>
                    </div>
                </div>
                <div class="row caixa_amostra">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                        <a href="{{ asset('storage/documentos/RQ028.docx') }}"
                            download="RQ028 - Formulário de Solicitação de Análise - Ambiental.docx">
                            <img class="icons-download rounded mx-auto d-block mt-2"
                                src="{{ asset('storage/icons/download-icon.png') }}">
                        </a>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                        <p class="titlecaixaamotra">Formulário de solicitação de análise ambiental </p>
                    </div>
                </div>
                <div class="row caixa_amostra">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                        <a href="{{ asset('storage/documentos/RQ026.docx') }}"
                            download="RQ026 - Questionário de Classificação de Resíduos.docx">
                            <img class="icons-download rounded mx-auto d-block mt-2"
                                src="{{ asset('storage/icons/download-icon.png') }}">
                        </a>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-12 col-xs-12">
                        <p class="titlecaixaamotra">Questionário de classificação de residuo sólido</p>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery('#submit').click(function(e) {
                e.preventDefault();
                jQuery.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                jQuery.ajax({
                    url: "amostra/SolicitarOrcamento",
                    method: 'post',
                    data: {
                        nome: jQuery('#nome').val(),
                        empresa: jQuery('#empresa').val(),
                        email: jQuery('#email').val(),
                        telefone: jQuery('#telefone').val(),
                        cnpj: jQuery('#cnpj').val(),
                        cidade: jQuery('#cidade').val(),
                        mensagem: jQuery('#mensagem').val(),

                    },
                    success: function(data) {
                        if (data.errors) {
                            jQuery('.alert-danger').empty();
                            jQuery.each(data.errors, function(key, value) {
                                $('.alert-danger').show();
                                $('.alert-danger').append('<p>' + value + '</p>');
                            });

                        }
                        if (data.success) {
                            alert(data.success);
                            jQuery('.alert-danger').fadeOut();
                            $('#ajax-form')[0].reset();
                        }
                    }

                });
            });
        });
    </script>
@endsection
