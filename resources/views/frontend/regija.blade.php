@extends('frontend.includes.frontend_core')

@section('content')
@if($id_regije == 1)
    <div class="videoWrapper">
    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/h6xUG5G_qX4?rel=0&fhd=1&autoplay=1&mute=1&showinfo=0&controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="allowfullscreen"></iframe>
    </div>
@elseif($id_regije == 2)

<header class="masthead" style="background-image: url({{ asset('uploads')}}/{{ $naslovna->naslovna_slika }});">
    <div class="container h-720">
      <div class="intro-text">
        <div class="intro-heading text-uppercase vendor-name drop-shadow">

                
                    Središnja Hrvatska
               </div>
      </div>
    </div>
    <div class="texture-handler bottom"><div class="texture bottom-texture"></div></div>
  </header>

  @endif
  <section class="page-section" id="o-nama">
        <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
            <div class="sub-opis sadrzaj-sardrzaj">
            @if($id_regije == 1)
                <h1>Slavonija i baranja</h1>
                <p>Istražite Slavoniju i Baranju</p>

                <p>Pozivamo Vas da probudite znatiželju, slobodu i strast. Upustite se u avanturu i potragu za
                novim iskustvima te doživite prelijepi krajolik istočne Hrvatske…
                Istražite i uživajte u predivnim prirodnim znamenitostima planinarenjem na Papuku, vožnjom
                bicikla u netaknutoj prirodi, promatranjem rijetkih ptica u poznatom Parku prirode Kopački rit,
                šetnjom ili jahanjem konja kroz slikovita slavonska sela. Osjetite dašak povijesti u
                mnogobrojnim dvorcima, tvrđavama, samostanima, muzejima i crkvama od Požege,
                Slavonskog Broda, Đakova, Osijeka pa do Vinkovaca, Vukovara i Iloka.</p>
                <p>Uživajte u raznolikoj gastronomskoj ponudi. Slavonci i Baranjci prepoznatljivom
                gostoljubljivošću, toplinom i druželjubljivošću ugostit će Vas i ponuditi Vam vrhunska lokalna
                vina i ljute specijalitete poput ribljeg paprikaša i čobanca, te vrhunsku šunku i božanstveni
                kulen.</p>

                <p><b>Dobrodošli u Slavoniju i Baranju!</b></p>


                @elseif($id_regije == 2)
                <p>Doživite središnju Hrvatsku kao nikada do sada. Središnja Hrvatska savršena je za odmor
                po mjeri čovjeka. Tradicija i običaji, idilično zeleno okruženje, romantični dvorci, vinski putevi
                i nezaboravna hrana.</p>
                <p>Čuvan gorom Medvednicom
                izniknuo iz dva naselja smještena na susjednim brežuljcima, glavni je i najveći grad
                Hrvatske. Uživajte u njegovom zelenilu i cvijeću i zaputite se ulicama grada u jedinstvenu
                šetnju kroz povijest. Zaželite li se slatkoga, zaputite se u Samobor, grad poznat po
                kremšnitama. Upoznajte posebni gurmanski doživljaj kontinentalne kuhinje i posjetite niz
                atrakcija poput špilja, rudnika i muzeja. Nezaobilazna lokacija je i Krapina gdje se obavezno
                mora posjetiti Muzej krapinskih neandertalaca koji će vas informirati o zanimljivim
                činjenicama vezane uz evoluciju čovjeka i fosilima pronađenima u Krapini. U blizini Krapine
                posjetite urbani, romantični, barokni i skladni grad kulture Varaždin. Prepustite se njegovoj
                ljepoti i uživajte u baroknoj arhitekturi, brojnim festivalima i skladnim trgovima.</p>
                <p>Pozivamo Vas da dođete i istražite netaknutu prirodu, uživate u pregršt zanimljivim, te
                kulturom i tradicijom bogatim lokacijama, jer život je putovanje, a onaj tko putuje doslovno
                dva puta živi!</p>
                @endif

            </div>
            </div>
        </div>
        </div>
    </section>

    
<div class="">
    <div class="container mt-20">
        <div>
            <span style="font-size: 1.18rem;">Ponuda:</span>
            <a href="/kategorija/8" class="btn btn-cta text-uppercase kategorije-label">Gastronomija</a>
            <a href="/kategorija/7" class="btn btn-cta text-uppercase kategorije-label">Smještaj</a>
            <a href="/kategorija/10" class="btn btn-cta text-uppercase kategorije-label">Zabava</a>
        </div>
        <div>
            <div class="mt-40">
            @foreach($vendors as $vendor)
                    @php
                        $ns_ext = explode('.', $vendor->naslovna_slika);
                        
                        if($ns_ext[1] !== 'jpg'){
                            @$naslovna_slika = $sadrzaj_vendora[$vendor->id]['medij'];

                            $ser = @unserialize($sadrzaj_vendora[$vendor->id]['medij']);

                            if($ser){
                                $naslovna_slika = $ser[0];
                            }
                        }else{
                            $naslovna_slika = $vendor->naslovna_slika;
                        }

                    @endphp
                <div class="col-lg-12 info-kartica p-lr-0 row">
                    <div class="col-lg-4 col-sm-12 col-md-12 p-lr-0">
                        <img class="col-md-12 col-sm-12 p-lr-0" src="{{ asset('uploads')}}/{{ $naslovna_slika }}">
                    </div>
                    <div class="info-kartica-content col-lg-8">
                        <h2>{{ base64_decode($vendor->naziv) }}</h2>

                        @php
                            $replace_in_p = array('<br>', '<p></p>', '<p>', '</p>', '<blockquote class="blockquote">', '</blockquote>');
                        @endphp
                        <p>{!! substr(str_replace($replace_in_p,'', base64_decode($vendor->opis)), 0, 150)  !!}...</p>
                        
                        <a class="btn btn-cta text-uppercase" href="/{{ $vendor->id }}">Detaljnije</a>
                        <span class="info-kartica-regija">
                            <a href="/regija/{{ $vendor->id_regije }}"><i class="fa fa-map-marker"></i> 
                                @if($vendor->id_regije == 1)
                                    Slavonija
                                @elseif($vendor->id_regije ==2)
                                    Središnja Hrvatska
                                @endif
                            </a>
                        </span>
                        <span class="info-kartica-kategorije">

                        </span>
                    </div>
                </div>
                @endforeach
            </div>
        </div
    </div>
</div>

@endsection