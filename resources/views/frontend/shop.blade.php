@extends('frontend.includes.frontend_core')

@section('content')
<div class="container pt-50">
    @include('frontend.modules.shop_categories_images')
</div>
<div class="container pocetna-kartice pt-50">
    @if(isset($category_name))
        @include('frontend.modules.sort_by')
    @endif
    @if(Request::path() !== 'shop/0')
        @include('frontend.modules.product_tags')
    @endif
    <div class="row">
        @foreach($products as $product)
            
            @include('frontend.modules.product')
            
        @endforeach
    </div>
</div>
@endsection