@php
$pro = [
[
"naziv" => "Kulen",
"slika" => "https://adria-delikatessen.com/wp-content/uploads/2022/08/slavonski-kulen1-transformed1-transformed1.png",
"url" => "https://adria-delikatessen.com/hr/produkt/kulen/",
"cijena" => "233.56",
"akcija" => 0,
],
[
"naziv" => "Kulenova seka",
"slika" => "https://adria-delikatessen.com/wp-content/uploads/2022/08/seka1-transformed-transformed1-1.png",
"url" => "https://adria-delikatessen.com/hr/produkt/kulenova-seka/",
"cijena" => "158.22",
"akcija" => 0,
],
[
"naziv" => "Domaća slavonska kobasica",
"slika" => "https://adria-delikatessen.com/wp-content/uploads/2022/08/slavonska-kobasica1-transformed-transformed.png",
"url" => "https://adria-delikatessen.com/hr/produkt/domaca-slavonska-kobasica/",
"cijena" => "82.87",
"akcija" => 0,
],
[
"naziv" => "Slanina",
"slika" => "https://adria-delikatessen.com/wp-content/uploads/2022/08/slanina1-transformed-transformed.png",
"url" => "https://adria-delikatessen.com/hr/produkt/slanina/",
"cijena" => "82.87",
"akcija" => 0,
],
[
"naziv" => "Slavonski čvarci",
"slika" => "https://adria-delikatessen.com/wp-content/uploads/2022/08/cvarak1-transformed-transformed.png",
"url" => "https://adria-delikatessen.com/hr/produkt/slavonski-cvarci/",
"cijena" => "97.94",
"akcija" => 0,
],
[
"naziv" => "Suhi vrat – Buđola",
"slika" => "https://adria-delikatessen.com/wp-content/uploads/2022/08/GETROCKNETER-SCHWEINENACKEN.jpeg",
"url" => "https://adria-delikatessen.com/hr/produkt/suhi-vrat-budola/",
"cijena" => "120.55",
"akcija" => 0,
],
]
@endphp

@foreach($pro as $product)


<div class="col-lg-4 pt-20">
    <div class="card drop-shadow-hover">
        <a href="{{ $product['url'] }}"><img src="{{ $product['slika'] }}" class="card-img-top card-product-image"
                alt="Adria-delikatessen.com"></a>
        <div class="card-body">
            <h5 class="card-title"><a style="color: #000;" href="{{ $product['url'] }}">{{ $product['naziv'] }}</a></h5>
            <div class="card-vendor-name"><a href="https://adria-delikatessen.com/hr"><b><i
                            class="fa fa-angle-right"></i> Adria-delikatessen.com</b></a></div>
            <span><a href="{{ $product['url'] }}" class="btn btn-outline-clhr"> <i class="fa fa-shoppimg-cart"></i>
                    Detaljnije</a></span>
            @if($product['akcija'] != 0)
            <span class="card-product-price"><span class="card-product-price-before">{{
                    number_format($product['cijena'], 2) }} KN</span>{{ number_format($product['akcija'], 2) }}
                KN</span>
            @else
            <span class="card-product-price">{{ number_format($product['cijena'], 2) }} KN</span>
            @endif
        </div>
    </div>
</div>

@endforeach