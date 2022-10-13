<html lang="pt">

<head>
    <title>{{ $endereco->nome }}</title>
    <link rel="shortcut icon" href="{{ asset("storage/endereco_site/{$endereco->img_icone}") }}" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/513c613801.js" crossorigin="anonymous"></script>


    <link href="{{ asset('css/site.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('js/mask.js') }}"></script>

</head>

<body>
    @if (Request::is('/'))
        <nav class="navbar navbar-expand-lg site-header sticky-top py-1 header" style="padding-bottom: 0px !important">
            <div class="container-fluid d-flex flex-column flex-md-row justify-content-between header1" id="myHeader">
                <a class="navbar-brand" href="#">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset("storage/endereco_site/{$endereco->img_logo}") }}">
                    </a>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link branco" href="{{ url('/') }}/quimicapura">O
                                LABORATÓRIO</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link branco" href="{{ url('/') }}/servicos">ANÁLISES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link branco" href="{{ url('/') }}/envie-sua-amostra">ENVIE SUA
                                AMOSTRA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link branco" href="#">SOLICITE UM ORÇAMENTO</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link branco" style="padding-top: 40%" href="{{$endereco->link_externo_logo}}" target="_blank"><i class="fa-solid fa-arrow-right-to-bracket"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="back_fundo">
                <h1 class="titulo-index-fundo">{{ $texto_fundo->titulo }}</h1>
            </div>
        </nav>
    @else
        <nav class="navbar navbar-expand-lg site-header sticky-top py-1"
            style="padding-bottom: 0px !important; border: 1px solid #ece6e6;">
            <div class="container-fluid d-flex flex-column flex-md-row justify-content-between" id="myHeader">
                <a class="navbar-brand" href="#">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset("storage/endereco_site/{$endereco->img_logo}") }}">
                    </a>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" {{ Request::is('laboratorio') ? 'style=color:#9ecf5c' : '' }}
                                href="{{ url('/') }}/quimicapura">O LABORATÓRIO</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" {{ Request::is('servicos') ? 'style=color:#9ecf5c' : '' }}
                                href="{{ url('/') }}/servicos">ANÁLISES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                                {{ Request::is('envie-sua-amostra') ? 'style=color:#9ecf5c' : '' }}
                                href="{{ url('/') }}/envie-sua-amostra">ENVIE SUA
                                AMOSTRA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link "
                                {{ Request::is('servicos') ? 'style=color:#9ecf5c' : '' }}href="#">SOLICITE UM
                                ORÇAMENTO</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link branco" style="padding-top: 40%" href="{{$endereco->link_externo_logo}}" target="_blank"><i class="fa-solid fa-arrow-right-to-bracket"></i></a>                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    @endif








    @yield('content')

    @extends('layouts.Site.footer')
</body>
<script>
    window.onscroll = function() {
        myFunction()
    };

    var header = document.getElementById("myHeader");
    var sticky = header.offsetTop;

    function myFunction() {
        if (window.pageYOffset > sticky) {
            header.classList.add("sticky");

        } else {
            header.classList.remove("sticky");

        }
    }


    function typeWriter(e) {
        const textoArray = e.innerHTML.split('')
        e.innerHTML = ''
        textoArray.forEach((letra, i) => {
            setTimeout(() => e.innerHTML += letra, 75 * i)
        });
    }
    const texto = document.querySelector('h1')
    typeWriter(texto)
</script>

</html>
