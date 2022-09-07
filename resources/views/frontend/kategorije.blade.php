@extends('frontend.includes.frontend_core')

@section('content')
<div class="">
    <div class="container" style="    padding-top: 140px;">
        <div>
            <span style="font-size: 1.18rem;">Ponuda:</span>
            <a href="#!" class="btn btn-cta text-uppercase kategorije-label">Gastronomija</a>
            <a href="#!" class="btn btn-cta text-uppercase kategorije-label">Smještaj</a>
            <a href="#!" class="btn btn-cta text-uppercase kategorije-label">Zabava</a>
        </div>
        <div>
            <div class="mt-40">
                @foreach($vendors as $vendor)
                    @php
                    $ns_ext = explode('.', $vendor->naslovna_slika);
                        
                        if($ns_ext[1] !== 'jpg'){
                            $naslovna_slika = $sadrzaj_vendora[$vendor->id]['medij'];

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
                            $replace_in_p = array('<br>', '<p></p>', '<p>', '</p>');
                        @endphp
                        <p>{!! substr(str_replace($replace_in_p,'', base64_decode($vendor->opis)), 0, 150)  !!}...</p>
                        
                        <a class="btn btn-cta text-uppercase" href="/{{ $vendor->id }}">Detaljnije</a>
                        <span class="info-kartica-regija">
                            <a href="/regija/{{ $vendor->id_regije }}"><i class="fa fa-map-marker"></i> 
                                @if($vendor->id_regije == 1)
                                    Slavonija i Baranja
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
<pre>



@endsection