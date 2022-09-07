 <!-- Header -->
 <header class="masthead" data-toggle="modal" data-target=".bs-example-modal-lg" style="background-image: url({{ asset('uploads')}}/{{ $vendor->naslovna_slika }});">
    <div class="container h-720">
      <div class="intro-text">
        <div class="intro-heading text-uppercase vendor-name drop-shadow">{{ base64_decode($vendor->naziv) }}</div>
        <a class="btn btn-cta btn-xl btn-video text-uppercase js-scroll-trigger" href="#o-nama">
          <i class="fas fa-arrow-down"></i> O nama
        </a>
      </div>
    </div>
    <div class="texture-handler bottom"><div class="texture bottom-texture"></div></div>
  </header>