@foreach($tags as $tag)
    @if($tag->count != 0)
        @php
            $count = 1;
        @endphp
    @endif
@endforeach
@if(isset($count))
    <hr>
    <div class="row">
        <div class="col-lg-12">
            <span class="kategorije">Oznake:<span>
            @foreach($tags as $tag)
                @if($tag->count != 0)
                    <a href="/oznaka/{{ $tag->id }}" class="product-tag">{{ $tag->naziv }} <span>({{ $tag->count }})</span></a>,
                @endif
            @endforeach
        </div>
    </div>
    <hr>
@endif