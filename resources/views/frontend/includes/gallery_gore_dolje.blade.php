
<div class="texture-handler texture-handler-menu top"><div class="texture top-texture"></div></div>
<div class="row" id="{{ $sadrzaj->id }}">
    @php
        if($broj_slika == 2){
            $class = 'col-lg-12';
        }elseif($broj_slika == 4){
            $class = 'col-lg-6';
        }
    @endphp

    @foreach($slika as $slika_za_prikaz)
        @if($broj_slika == 2)
            @if($loop->iteration == 1)
                <img data-toggle="modal" data-target=".bs-example-modal-lg" src="{{ asset('uploads')}}/{{ $slika_za_prikaz }}" class="{{ $class }} p-lr-0">
            @endif
        @elseif($broj_slika == 4)
            @if($loop->iteration <= 2)
                <img data-toggle="modal" data-target=".bs-example-modal-lg" src="{{ asset('uploads')}}/{{ $slika_za_prikaz }}" class="{{ $class }} p-lr-0">
                @if($loop->iteration == 4)
                    @break
                @endif
            @endif
        @endif
    @endforeach
</div>
<div class="container">
    <div class="col-lg-8 offset-lg-2 text-center">
            <h2 class="ssection-heading text-uppercase mali-sadrzaj-title col-md-12">

                @if(base64_decode($sadrzaj->naslov) != "0")
                    {{ base64_decode($sadrzaj->naslov) }}
                @endif
            </h2>
            <div class="sub-opis sadrzaj-sardrzaj">
                {!! base64_decode($sadrzaj->sadrzaj) !!}
            </div>
            </div>
    </div>

<div class="row" id="{{ $sadrzaj->id }}">
    @foreach($slika as $slika_za_prikaz)
        @if($broj_slika == 2)
            @if($loop->iteration == 2)
                <img data-toggle="modal" data-target=".bs-example-modal-lg" src="{{ asset('uploads')}}/{{ $slika_za_prikaz }}" class="{{ $class }} p-lr-0">
            @endif
        @elseif($broj_slika == 4)
            @if($loop->iteration > 2)
                <img data-toggle="modal" data-target=".bs-example-modal-lg" src="{{ asset('uploads')}}/{{ $slika_za_prikaz }}" class="{{ $class }} p-lr-0">
                @if($loop->iteration == 4)
                    @break
                @endif
            @endif
        @endif
    @endforeach
</div>