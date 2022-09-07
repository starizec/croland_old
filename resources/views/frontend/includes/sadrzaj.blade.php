<header class="masthead" data-toggle="modal" data-target=".bs-example-modal-lg" style="background-image: url({{ asset('uploads')}}/{{ $sadrzaj->medij }});">
    <div class="texture-handler top"><div class="texture top-texture"></div></div>
        <div class="container h-720">
        <div class="intro-text">

        </div>
        </div>
        <div class="texture-handler bottom"><div class="texture bottom-texture"></div></div>
    </header>
        <!-- Services -->
        <section class="page-section" id="o-nama">
        <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
            <h2 class="section-heading text-uppercase sadrzaj-title">
                @if(base64_decode($sadrzaj->naslov) != "0")
                    {{ base64_decode($sadrzaj->naslov) }}
                @endif</h2>
            <div class="sub-opis sadrzaj-sardrzaj">{!! shortcode(base64_decode($sadrzaj->sadrzaj)) !!}</div>
            </div>
        </div>
        </div>
    </section>