@extends('frontend.includes.frontend_core')

@section('content')

<div class="container proizvod" style="background-color: white; padding-top: 120px;">
    <div class="row">
        <div class="col-lg-6">
            <!--slider-->
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach($galerija as $id => $slika)
                    <div class="carousel-item 
                @if($id == 0)
                    active
                @endif
                ">
                        <img style="padding-bottom: 20px;" class="d-block w-100"
                            src="{{ asset('uploads')}}/{{ $slika->slika }}" alt="Third slide">
                    </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <!--/slider-->
        </div>
        <div class="col-lg-6">
            <h1 class="naziv-proizvoda">{{ $proizvod->naziv }}</h1>
            <div class="proizvod-prodaje">Prodaje: <a href="/{{ $prodaje->id }}">{{ base64_decode($prodaje->naziv)
                    }}</a></div>
            <hr>
            <div class="row">
                <div class="col-lg-4">
                    <h2 class="cijena-proizvoda">{{ number_format($proizvod->cijena, 2) }} KN <br> <span
                            class="eu-price">{{ number_format($proizvod->cijena / 7.51, 2) }} EUR</span></h2>
                </div>
                <div class="col-lg-8 odricanje-odgovornosti-cijene">
                    <div class="container">
                        <div class="module">
                            <p class="collapse" id="collapseExample" aria-expanded="false" style="line-height: 1.28;
    font-size: 14px;
    letter-spacing: 1.2px;">
                                Svi podaci vezani uz artikle prezentirani su u dobroj namjeri. CroLand.hr ne odgovara za
                                eventualne pogreške nastale u opisu proizvoda, greške prilikom štampanja te promjene
                                cijena. Slike artikala su ilustrativne prirode te ne moraju u potpunosti odgovarati
                                artiklima. Za sve eventualne nejasnoće slobodni ste nas kontaktirati na info@croland.hr.
                            </p>
                            <a role="button" class="collapsed" data-toggle="collapse" href="#collapseExample"
                                aria-expanded="false" aria-controls="collapseExample"></a>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="opis-proizvoda">
                <h2>Opis proizvoda</h2>
                {!! $proizvod->opis !!}
            </div>
            <form role="form" action="/shop/add-to-cart" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="return_url" value="/shop/proizvod/{{ $proizvod->id}}">
                <input type="hidden" name="id_proizvoda" value="{{ $proizvod->id }}" name="addtocart">
                <div class="add-to-cart">
                    <span class="btn qty" onClick="rmQty()">-</span>
                    <input class="qty-input" type="number" value="1" name="kolicina" id="kolicina">
                    <span class="btn qty" onClick="addQty()">+</span>
                    <button for="addtocart" class="btn btn-success"><i class="fa fa-shopping-cart"></i> Dodaj u
                        košaricu</button>
            </form>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Kontakt</button>
            <!-- Modal -->

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-clhr" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Kontaktirajte prodavača {{
                                base64_decode($prodaje->naziv) }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="contactForm" name="sentMessage" novalidate="novalidate">
                                {{ csrf_field() }}
                                <input type="hidden" name="to_email" value="{{ $prodaje->email }}">
                                <input type="hidden" name="return_path" value="{{ request()->path() }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input class="form-control" name="name" id="name" type="text"
                                                placeholder="Ime *" required="required"
                                                data-validation-required-message="Please enter your name." required>
                                            <p class="help-block text-danger"></p>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" name="from_email" id="email" type="email"
                                                placeholder="Email *" required="required"
                                                data-validation-required-message="Please enter your email address."
                                                required>
                                            <p class="help-block text-danger"></p>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" name="phone" id="phone" type="tel"
                                                placeholder="Broj telefona" required="required"
                                                data-validation-required-message="Please enter your phone number.">
                                            <p class="help-block text-danger"></p>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" name="message" id="message"
                                                placeholder="Upit *" required="required"
                                                data-validation-required-message="Please enter a message." rows="5"
                                                required></textarea>
                                            <p class="help-block text-danger"></p>
                                            <button id="sendMessageButton" class="btn btn-info text-uppercase"
                                                type="submit">Pošalji</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /modal -->
            <script>
                function addQty(){
                        let kolicina = document.getElementById('kolicina').value;
                        let nova_kolicina = ++kolicina;
                        document.getElementById('kolicina').value = nova_kolicina;
                    }

                    function rmQty(){
                        let kolicina = document.getElementById('kolicina').value;
                        let nova_kolicina = --kolicina;
                        document.getElementById('kolicina').value = nova_kolicina;
                    }
            </script>
            <div class="odricanje-odgovornosti-cijene mt-10">
                <i class="fa fa-truck"></i> Dostava nije uključena u cijenu. <a href="#!"><u>Napomene</u></a>
            </div>
        </div>
        <hr>
        <div class="kategorije-proizvoda">Pogledajte još proizvoda u:
            @foreach($kategorija as $kat)
            @foreach($kategorije as $kate)
            @if($kate->id == $kat->id_kategorije)
            <a href="/shop/{{ $kate->id }}" class="btn btn-kategorija">{{ $kate->naziv }}</a>
            @endif
            @endforeach
            @endforeach
        </div>
    </div>
</div>
</div>
{{-- <div class="container pocetna-kartice">
    <h3>U suradnji s Adria-delikatessen.com</h3>
    <div class="row">

        @include('frontend.adria-delikatessen.marketing')

    </div>
</div> --}}
<div class="container pocetna-kartice">
    <h3>Svi proizvodi prodavača</h3>
    <div class="row">
        @foreach($seller_products as $product)

        @include('frontend.modules.product')

        @endforeach
    </div>
</div>
@if($products)
<div class="container pocetna-kartice pt-50">
    <h3>Izdvojeno iz kategorije</h3>
    <div class="row">
        @foreach($products as $product)

        @include('frontend.modules.product')

        @endforeach
    </div>
</div>
@endif
@endsection