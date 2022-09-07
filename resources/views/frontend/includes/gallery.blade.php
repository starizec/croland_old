<div class="container">
    <div class="col-lg-8 offset-lg-2 text-center">
            <h2 class="ssection-heading text-uppercase mali-sadrzaj-title col-md-12">

                @if(base64_decode($sadrzaj->naslov) != "0")
                    {{ base64_decode($sadrzaj->naslov) }}
                @endif
            </h2>
            <div class="sub-opis sadrzaj-sardrzaj">
                {!! shortcode(base64_decode($sadrzaj->sadrzaj)) !!}
            </div>
            </div>
    </div>
<div class="texture-handler texture-handler-menu top"><div class="texture top-texture"></div></div>
<div class="row" id="{{ $sadrzaj->id }}">
    @php
        if($broj_slika == 2){
            $class = 'col-lg-6';
        }elseif($broj_slika == 4){
            $class = 'col-lg-3';
        }elseif($broj_slika == 8){
            $class = 'col-lg-3';
        }
    @endphp

    @foreach($slika as $slika)
        <img data-toggle="modal" data-target=".bs-example-modal-lg" src="{{ asset('uploads')}}/{{ $slika }}" class="{{ $class }} p-lr-0">
    @endforeach
</div>