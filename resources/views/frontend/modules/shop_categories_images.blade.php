<div class="container p-lr-0" style="margin-top: 66px;">
    <div class="row">
        @if($categories)
            @foreach($categories as $category)
                <div class="col-lg-3 mt-20 img-container" onClick="location.href='/shop/{{ $category->id }}';">
                    <img src="{{ asset('images')}}/{{ $category->image }}" class="rounded drop-shadow drop-shadow-hover" style="width: 100%;">
                    <div class="img-text">
                        <h4>{{ $category->naziv }}</h4>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
