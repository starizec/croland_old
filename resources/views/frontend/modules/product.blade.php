
@if($product)
    <div class="col-lg-4 pt-20">    
        <div class="card drop-shadow-hover">
            <a href="/shop/proizvod/{{ $product->id }}"><img src="{{ asset('uploads')}}/{{ $product->slika }}" class="card-img-top card-product-image" alt="{{ $product->vendor }}"></a>
            <div class="card-body">
                <h5 class="card-title"><a style="color: #000;" href="/shop/proizvod/{{ $product->id }}">{{ $product->naziv }}</a></h5>
                <div class="card-vendor-name"><a href="/{{ $product->id_vendora }}"><b><i class="fa fa-angle-right"></i> {{ $product->vendor }}</b></a></div>
                    <span><a href="/shop/proizvod/{{ $product->id }}" class="btn btn-outline-clhr"> <i class="fa fa-shoppimg-cart"></i> Detaljnije</a></span>
                    @if($product->cijena_popust != 0)           
                        <span class="card-product-price"><span class="card-product-price-before">{{ number_format($product->cijena, 2) }} KN</span>{{ number_format($product->cijena_popust, 2) }} KN</span>
                    @else
                        <span class="card-product-price">{{ number_format($product->cijena, 2) }} KN</span>
                    @endif
            </div>
        </div>
    </div>
@else
    No products to display
@endif