@extends('frontend.includes.frontend_core')

@section('content')

@php
  $medij = explode('.', $vendor->naslovna_slika);
  $ext   = $medij[1];

  function shortcode($txt){
    $jel_p = '[jelovnik]';
    $jel_p = strtolower($jel_p);

    $jel_k = '[/jelovnik]';
    $jel_k = strtolower($jel_k);


    $rm_jelovnik = array('[jelovnik]', '[/jelovnik]');

    $html = '';

    if(strpos($txt, $jel_p) && strpos($txt, $jel_k)){
      preg_match_all('/\*\*\*(.*?)\*\*\*/', $txt, $kategorije);

      $sadrzaj = str_replace($rm_jelovnik, '', $txt);

      $sadrzaj = explode('***', $sadrzaj);

      $replace_naslov = "/(\*\*.*?)(.*?)(\*\*)/";
      $replace_naslov_w = '<div class="naziv_jela">$2</div>';
      $sadrzaj = preg_replace($replace_naslov, $replace_naslov_w, $sadrzaj);

      $replace_naslov = "/(\*.*?)(.*?)(\*)/";
      $replace_naslov_w = '<div class="sastav_jela">$2</div>';
      $sadrzaj = preg_replace($replace_naslov, $replace_naslov_w, $sadrzaj);
      


      $html = '<ul class="nav nav-tabs jelovnik-tabs">';
      
      foreach($kategorije[1] as $id => $kat){
          $active = '';
          if($id == 0){
            $active = 'active';
          }
          $html .= '<li class="jelovnik-li"><a class="'.$active.' jelovnik-a" data-toggle="tab" href="#menu'.$id.'">'.$kat.'</a></li>';
      }
      
      $html .= '</ul><div class="tab-content">';
      $i = 0;

      foreach($sadrzaj as $ida => $sa){
          if($ida != 0){
            if($ida % 2 === 0){
              $is_active = '';

              if($i == 0){
                $is_active = 'active show';
              }
              $html .= '<div id="menu'.$i.'" class="tab-pane fade in '.$is_active.'">';
              $html .= $sa;
              $html .= '</div>';

              $i++;
            }            
          }
          
      }
      $html .= '</div>';    

      echo $html;
    }else{
      $replace_sc = "/(\[\')(.*?)(\'\])/";
      $replace_sc_w = '<img class="badge-smjestaj badge-right" src="/images/';
      $replace_sc_w .= "$2";
      $replace_sc_w .= '.png">';
      
      $text = preg_replace($replace_sc, $replace_sc_w, $txt);
      
      return $text;
    }
  }


  //youtube embed
  $yt = str_replace('www.youtube.com/watch?v=', 'www.youtube.com/embed/', $vendor->youtube_link);
  $yt = str_replace('&feature=youtu.be', '', $yt);
  $youtube_link = '<iframe src="'.$yt.'?rel=0&fhd=1&autoplay=1&mute=1&showinfo=0&controls=0" frameborder="0" allowfullscreen></iframe>';
  
@endphp

@if($ext == 'jpg')
  @include('frontend.includes.image')
@elseif($ext == 'mp4')
  @include('frontend.includes.video')
@endif

<main>
    <nav class="floating-menu">
        <ul class="main-menu">
        <li>
            <a href="#o-nama" class="ripple">
                <i class="fas fa-circle"></i>
            </a>
        </li>
          @foreach($sadrzaj as $id)
            <li>
                <a href="#{{ $id->id }}" class="ripple">
                    <i class="fas fa-circle"></i>
                </a>
            </li>
          @endforeach
        </ul>
        <div class="menu-bg"></div>
    </nav>
</main>
    <!-- Services -->
    <section class="page-section" id="o-nama">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2 text-center">
          <h2 class="section-heading text-uppercase sadrzaj-title">O nama</h2>
          <div class="sub-opis">{!! base64_decode($vendor->opis) !!}</div>
          
        </div>
      </div>
    </div>
  </section>

  @if($sadrzaj)
    @foreach($sadrzaj as $sadrzaj)

      {{-- SLIKA DOLJE --}}
      @if($sadrzaj->prikaz_sadrzaja == 1)
        @php
          $slika = @unserialize($sadrzaj->medij);

          if($slika == false){
            $broj_slika = 1;
          }elseif($slika !== false){
            $broj_slika = count($slika);
          }
        @endphp

        @if($broj_slika < 2)
          @include('frontend.includes.sadrzaj')
        @elseif($broj_slika > 1)
          @include('frontend.includes.gallery')
        @endif

      @elseif($sadrzaj->prikaz_sadrzaja == 2)
        @include('frontend.includes.sadrzaj_desno')

      @elseif($sadrzaj->prikaz_sadrzaja == 3)
        @include('frontend.includes.sadrzaj_lijevo')

      @elseif($sadrzaj->prikaz_sadrzaja == 4)
        @php
          $slika = @unserialize($sadrzaj->medij);

          if($slika == false){
            $broj_slika = 1;
          }elseif($slika !== false){
            $broj_slika = count($slika);
          }
        @endphp

          @if($broj_slika < 2)
            @include('frontend.includes.sadrzaj')
          @elseif($broj_slika > 1)
            @include('frontend.includes.gallery_gore')
          @endif

      @elseif($sadrzaj->prikaz_sadrzaja == 5)
        @php
          $slika = @unserialize($sadrzaj->medij);

          if($slika == false){
            $broj_slika = 1;
          }elseif($slika !== false){
            $broj_slika = count($slika);
          }
        @endphp
          @if($broj_slika == 2)
            @include('frontend.includes.gallery_gore_dolje')
          @elseif($broj_slika == 4)
            @include('frontend.includes.gallery_gore_dolje')
          @endif
      @endif
    @endforeach
  @endif

  <section class="page-section" id="contact">
  <div class="texture-handler top-mail"><div class="texture top-texture-mail"></div></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          
        </div>
      </div>
      <div class="row">
        <div class="container">
          <form id="contactForm" name="sentMessage" novalidate="novalidate">
          {{ csrf_field() }}
          <input type="hidden" name="to_email" value="{{ $vendor->email }}">
          <input type="hidden" name="return_path" value="{{ request()->path() }}">
            <div class="row">
              <div class="col-md-6">
                <div class="kontakt-ljudi">
                <h2 class="section-heading text-uppercase">Prima:</h2>
                  <div class="">{{ base64_decode($vendor->naziv) }}</div>
                  <div class="">{{ base64_decode($vendor->adresa) }}</div>
                  <div class="">{{ $vendor->postanski_broj }} {{ base64_decode($vendor->mjesto) }}</div>
                  @if($vendor->oib)
                  <div class="">OIB: {{ $vendor->oib }}</div>
                  @endif
                  <div class="" style="word-wrap: break-word;">{{ $vendor->email }}</div>
                  <div class="">{{ $vendor->telefon }}</div>
                </div>
              </div>
              <div class="col-md-6">
              <div class="form-group">
                  <input class="form-control" name="name" id="name" type="text" placeholder="Ime *" required="required" data-validation-required-message="Please enter your name." required>
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <input class="form-control" name="from_email" id="email" type="email" placeholder="Email *" required="required" data-validation-required-message="Please enter your email address." required>
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <input class="form-control" name="phone" id="phone" type="tel" placeholder="Broj telefona" required="required" data-validation-required-message="Please enter your phone number.">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" id="message" placeholder="Upit *" required="required" data-validation-required-message="Please enter a message." required></textarea>
                  <p class="help-block text-danger"></p>
                  <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Pošalji</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  {!! str_replace('600', '100%', $vendor->lokacija) !!}

<div class="preporuke">
<div class="container">
<h2 class="naslov-preporuke">Preporuke za vas...</h2>
      <div class="row">
          @foreach($preporuke as $preporuka)
          <div class="col-lg-4 mt-20">
            <div class="col-lg-12 preporuke-card">
              <img src="{{ asset('uploads')}}/{{ $preporuka->naslovna_slika }}">
              <h2 class="preporuka-vendor-naslov">
                @if(strlen(base64_decode($preporuka->naziv)) > 30)
                  {{ substr(base64_decode($preporuka->naziv), 0, 30) }}...
                @else
                  {{ base64_decode($preporuka->naziv) }}
                @endif
                </h2>
              <div class="info-kartica-regija-preporuka">
                            <a href="/regija/{{ $vendor->id_regije }}"><i class="fa fa-map-marker"></i> 
                                @if($preporuka->id_regije == 1)
                                    Slavonija i Baranja
                                @elseif($preporuka->id_regije ==2)
                                    Središnja Hrvatska
                                @endif
                            </a>
                        </div>
              <a class="btn btn-cta text-uppercase" href="/{{ $preporuka->id }}">Detaljnije</a>
              </div>
            </div>
          @endforeach
      </div>
</div>
</div>


<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

  
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    
          @if(!empty($slider))
            @foreach($slider as $key => $slide)
            <div class="carousel-item
            @if($key == 1)
              active
            @endif
            ">
              <img src="{{ asset('uploads')}}/{{ $slide }}" class="d-block w-100" alt="...">
            </div>
            @endforeach
          @endif
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Prijašnja</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Sljedeća</span>
  </a>
</div>
  

      </div>
    </div>
  </div>
</div>
@endsection
