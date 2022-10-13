<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Quimica Pura') }}</title>

    <script src="{{ asset('/js/jquery-3.3.1_1.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('/js/jquery.mask.min.js') }}"></script>

    <script src="{{ asset('/js/mask.js') }}"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/513c613801.js" crossorigin="anonymous"></script>


    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css" rel="stylesheet">
    <script src="{{ asset('/js/summernote-pt.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.js"></script>
</head>



<body>
    <div class="container-fluid">
        <div class="row content">
            <div class="col-sm-2 col-md-2 col-lg-2 col-xs-12 sidenav">
                <h2> <a href="{{ url('/') }}">
                        <img src="{!! asset('img/logo-novo_liion1.jpeg') !!}" style="width: 100%">
                    </a>
                </h2>

                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest

                    @else

                    <ul class="nav-pills nav-stacked" style="margin-left: -30px;">
                        <!--                            <h2 style="color:#b6d600">Menu</h2>-->
                        <BR />
                        <a href="{{url('/painel')}}/produtos">
                            <h4>Produtos</h4>
                        </a>
                        <a href="{{url('/painel')}}/categorias">
                            <h4>Categorias</h4>
                        </a>
                        <a href="{{url('/painel')}}/noticias">
                            <h4>Noticias</h4>
                        </a>
                        <a href="{{url('/painel')}}/sustentabilidade">
                            <h4>Sustentabilidade</h4>
                        </a>
                        <a href="{{url('/painel')}}/empresa">
                            <h4>Empresa</h4>
                        </a>
                        <a href="{{url('/painel')}}/contatos">
                            <h4>Contatos</h4>
                        </a>
                    </ul><br>

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
            <div class="col-sm-10 col-md-10 col-lg-10 col-xs-12">
                @yield('content')
            </div>
            @extends('layouts.footer')
            </main>
        </div>
        <style>
            .container {
                margin-top: 2%;
            }

            /* Set gray background color and 100% height */
            .sidenav {
                background-color: #000;
                color: white;
                min-height: 800px;
                height: auto;
            }

            /* Set black background color, white text and some padding */
            footer {
                background-color: #000;
                color: white;
                padding: 15px;
                display: block;
                left: 0;
                bottom: 0;
                width: 100%;
            }

            /* On small screens, set height to 'auto' for sidenav and grid */
            @media screen and (max-width: 767px) {
                .sidenav {
                    height: auto;
                    padding: 15px;
                }

                .row.content {
                    height: auto;
                }
            }

            h4 {
                color: white;
            }

            a:hover {
                text-decoration: none;
            }
        </style>
        <script>
            $(document).ready(function() {
                $('#descricao').summernote({
                    lang: 'pt-BR',
                    tabsize: 4,
                    height: 200,
                    toolbar: [
                        // [groupName, [list of button]]
                        ['style', ['bold', 'italic', 'underline', 'link']],
                        ['para', ['ul', 'ol', 'paragraph']],
                    ]

                });
            });
        </script>