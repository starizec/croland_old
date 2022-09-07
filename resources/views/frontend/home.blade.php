@extends('frontend.includes.frontend_core')

@section('content')

@if(!strpos(URL::current(), 'search'))
    @include('frontend.modules.front_video')
@else
    @php
        $search_style = 'style="padding-top: 80px;"';
    @endphp
@endif

@include('frontend.modules.front_image')

@include('frontend.modules.categories_images')

<div>
    @if(@$search_style)
        {!! $search_style !!}
    @endif

    <div class="container pocetna-kartice">
        
        @include('frontend.modules.filters')
        @include('frontend.modules.mapbox')

        
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
                <div class="col-lg-12 info-kartica p-lr-0 row fade-in drop-shadow-hover">
                    <div class="col-lg-4 col-sm-12 col-md-12 p-lr-0">
                        <img class="col-md-12 col-sm-12 p-lr-0" src="{{ asset('uploads')}}/{{ $naslovna_slika }}">
                    </div>
                    <div class="info-kartica-content col-lg-8">
                        <h2>{{ base64_decode($vendor->naziv) }}</h2>

                        @php
                            $replace_in_p = array('<br>', '<p></p>', '<p>', '</p>', '<blockquote class="blockquote">', '</blockquote>');
                        @endphp
                        <p>{!! substr(str_replace($replace_in_p,'', base64_decode($vendor->opis)), 0, 150)  !!}...</p>
                        
                        <a class="btn btn-clhr text-uppercase" href="/{{ $vendor->id }}">Detaljnije</a>
                        <span class="info-kartica-regija">
                            <a href="/regija/{{ $vendor->id_regije }}"><i class="fa fa-map-marker"></i> 
                                @if($vendor->id_regije == 1)
                                    Slavonija i Baranja
                                @elseif($vendor->id_regije ==2)
                                    Središnja Hrvatska
                                @endif
                            </a>
                        </span>
                        <span>
                        <span style="margin: 0 10px;"> | </span>
                        </span >
                        <span class="info-kartica-ikone">
                            @php
                                @$ikone = unserialize($vendor->icone);
                            @endphp

                            @if($ikone != false)
                                @foreach($ikone as $id_ikone => $ikon)
                                    @foreach($icons as $icon)
                                        @if($id_ikone == $icon->id)
                                            <i style="margin-right: 5px;" class="{{ $icon->fa_icon }}"></i>
                                        @endif
                                    @endforeach
                                @endforeach
                            @endif
                        </span>
                    </div>
                </div>
                @endforeach
            </div>
    </div>
</div>

<div class="container pocetna-kartice">
    @include('frontend.modules.front_articles')
</div>

<div class="container pocetna-kartice">
    <h3>Trgovina<a href="/shop/0" class="trgovina-link"> (svi proizvodi)</a></h3>
    <div class="row">
        @foreach($products as $product)
            
            @include('frontend.modules.product')
            
        @endforeach
    </div>
</div>

@endsection