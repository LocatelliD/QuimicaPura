<!-- Remove the container if you want to extend the Footer to full width. -->
<!-- Footer -->

<footer class="text-center text-lg-start text-white" style="background-color: #0c5149">
    <!-- Grid container -->
    <div class="container-fluid p-4 pb-0">
        <!-- Section: Links -->
        <section class="">
            <!--Grid row-->
            <div class="row">
                <!-- Grid column -->
                <div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 mx-auto mt-3 text-center">
                    <div class="fundo-branco">
                        @foreach ($certificados as $certificado)
                            <img src="{{ asset("storage/certificados/{$certificado->imagem}") }}"
                                class='rounded d-block mx-auto' style='width:45%'>
                        @endforeach

                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 mx-auto mt-3 text-center">
                    <h6 class="text-uppercase mb-4 font-weight-bold">Contato</h6>
                    <p><i class="fas fa-home mr-3"></i>
                        {{ $endereco->endereco }}{{ $endereco->cidade }}/{{ $endereco->estado }}</p>
                    <p><i class="fas fa-envelope mr-3"></i> {{ $endereco->email }}</p>
                    <p><i class="fas fa-phone mr-3"></i> {{ $endereco->telefone }}</p>
                    <p><i class="fas fa-print mr-3"></i> {{ $endereco->telefone_2 }}</p>
                </div>

                <div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 mx-auto mt-3">

                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <iframe width="400" height="337" id="gmap_canvas"
                                src="https://maps.google.com/maps?q=Baltazar%20de%20Oliveira%20Garcia,%201899%20Porto%20Alegre%20/RS&t=&z=15&ie=UTF8&iwloc=&output=embed"
                                frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                        </div>
                    </div>
                </div>
                <!--Grid row-->
        </section>
        <!-- Section: Links -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: #0d192b; margin-top:2%;">
        © 2022 Copyright: Dlocatelli

    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->
