<section class="video-header" style="padding-top: 106px;">
  <div class="overlay"></div>
  <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
    <source src="{{ asset('uploads')}}/{{ $vendor->naslovna_slika }}" type="video/mp4">
  </video>
  <div class="container col-lg-12 fade-in" id="text-overlay">
    <div class="d-flex h-100 text-center align-items-center">
      <div class="w-100 text-white">
        <h1 class="intro-heading text-uppercase vendor-name drop-shadow mt-25p">{{ base64_decode($vendor->naziv) }}</h1>
        <a href="#o-nama" class="btn btn-cta btn-video btn-xl text-uppercase d-none d-xl-block" ><i class="fas fa-arrow-down"></i> O nama</a>
        <button class="btn btn-cta btn-video btn-xl text-uppercase" data-toggle="modal" data-target="#exampleModal" ><i class="fas fa-play"></i> Pogledaj video</button>
      </div>
    </div>
  </div>
  <div class="container col-lg-12 text-center align-items-center" >
    <button class="btn btn-cta btn-xl text-uppercase btn-show-text" style="display: none;" onclick="show_txt()" id="show-txt-button"><i class="fas fa-plus"></i></button>
  </div>
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

        <div class="videoWrapper">
          {!! $youtube_link !!}
        </div>

        </div>
      </div>
    </div>
  </div>
</div>



<script>
  
  function hide_txt(){
    var txt_overlay = document.getElementById("text-overlay");
    var button_show_txt = document.getElementById("show-txt-button");

    txt_overlay.classList.remove('fade-in');
    txt_overlay.classList.add('fade-out');
    txt_overlay.style.display = "none";

    button_show_txt.classList.remove('fade-out');
    button_show_txt.classList.add('fade-in');
    button_show_txt.style.display = "inline";
  }

  function show_txt(){
    var txt_overlay = document.getElementById("text-overlay");
    var button_show_txt = document.getElementById("show-txt-button");

    txt_overlay.classList.remove('fade-out');
    txt_overlay.classList.add('fade-in'); 
    txt_overlay.style.display = "inline";

    button_show_txt.classList.remove('fade-in');
    button_show_txt.classList.add('fade-out');
    button_show_txt.style.display = "none";
  } 
</script>