<div class="row" id="{{ $sadrzaj->id }}">
    <div class="col-md-6 p-lr-0">
        <div class="col-lg-8 offset-lg-2 sub-opis">
            <h2 class="section-heading text-uppercase mali-sadrzaj-title col-md-12">
                @if(base64_decode($sadrzaj->naslov) != "0")
                    {{ base64_decode($sadrzaj->naslov) }}
                @endif
            </h2>
                {!! shortcode(base64_decode($sadrzaj->sadrzaj)) !!}
        </div>
    </div>
    <img data-toggle="modal" data-target=".bs-example-modal-lg" src="{{ asset('uploads')}}/{{ $sadrzaj->medij }}" class="col-md-6 p-lr-0">
</div>