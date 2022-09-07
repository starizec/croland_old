@extends('frontend.includes.frontend_core')

@section('content')
<div class="container proizvod" style="background-color: white; padding-top: 130px;">
    <div class="row">
        <div class="col-lg-6">
            <h1 class="naziv-proizvoda">Plaćanje</h1>
            <hr>
            <form role="form" action="/shop/narudjba" method="post">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label style="font-weight: bold;">Ime</label>
                    <input name="ime_kupca" type="text" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                    <label style="font-weight: bold;">Prezime</label>
                    <input name="prezime_kupca" type="text" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label style="font-weight: bold;">Adresa</label>
                    <input type="text" class="form-control" name="adresa_kupca" required>
                </div>
                <div class="form-group">
                    <label style="font-weight: bold;">Mjesto</label>
                    <input type="text" class="form-control" name="mjesto_kupca" required>
                </div>
                <div class="form-group">
                    <label style="font-weight: bold;">Poštanski broj</label>
                    <input type="text" class="form-control" name="pp_kupca" required>
                </div>
                <div class="form-group">
                    <label style="font-weight: bold;">Telefon</label>
                    <input type="text" class="form-control" name="telefon_kupca" required>
                </div>
                <div class="form-group">
                    <label style="font-weight: bold;">Email</label>
                    <input type="text" class="form-control" name="email_kupca" required>
                </div>
                <div class="form-group">
                    <label style="font-weight: bold;">Napomene</label>
                    <textarea type="text" class="form-control" name="napomena_kupca"></textarea>
                </div>
        </div>
        <div class="col-lg-6">
            
        </div>
        <div class="col-lg-6">
            <h1 class="naziv-proizvoda mt-40" style="margin-bottom: 20px;">Vaša narudžba</h1>
            @foreach($cart_products as $vendor)
            @php
                $total_by_vendor = array();
            @endphp
                <div class="proizvod-prodaje" style="margin-top: 40px;">Prodavač: 
                    @if($vendor['vendor'])
                        <a href="#!">{{ base64_decode($vendor['vendor']->naziv) }} </a>
                    @endif
                </div>
                    <table class="table">
                        <thead>                  
                            <tr>
                                <th width="80%">Proizvod</th>
                                <th width="20%">Ukupno</th>
                            </tr>
                            @if($vendor['products'])
                                @foreach($vendor['products'] as $product)
                                    <tr>
                                        <td>
                                            {{ $product['naziv'] }} <span style="font-weight: bold;">x
                                            @foreach($cart as $id => $qty)
                                                @if($product['id'] == $id)
                                                    {{ $qty }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($cart as $id => $qty)
                                                @if($product['id'] == $id)
                                                    @php
                                                        $total[] = $total_by_vendor[] = $qty*$product['cijena'];
                                                        $total_by_product[$id] = $qty*$product['cijena'];

                                                        //var_dump($total_by_product);
                                                    @endphp
                                                @endif
                                            @endforeach
                                            @foreach($total_by_product as $id => $value)
                                                @if($id == $product['id'])
                                                    {{ number_format($value, 2) }} KN
                                                @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td style="background-color: #ededed; font-weight: bold;">
                                        UKUPNO
                                    </td>
                                    <td style="background-color: #ededed; font-weight: bold;">
                                        {{ number_format(array_sum($total_by_vendor), 2) }} KN
                                    </td>
                                </tr>
                            @endif                                    
                        </thead>                        
                    </table>
                    @php
                        unset($total_by_vendor);
                    @endphp
            @endforeach
            <table class="table">
                <thead>
                    <tr>
                        <td style="font-size: 1.5rem; font-weight: bold;">
                            IZNOS UKUPNO
                        </td>
                        <td style="font-size: 1.5rem; font-weight: bold; text-align: right; color: #62a70f;">
                            {{ number_format(array_sum($total), 2) }} KN
                        </td>
                    </tr>
                </thead>
            </table>        
            <div>
                <p>
                <input type="checkbox" name="uvijeti_koristenja" id="uvijeti" onClick="enableBtn()"> Pročitao/la sam i slažem se s uvjetima korištenja i odredbama web-stranice.
                </p>
                <div class="alert alert-danger">
                    <p>
                    <b>NAPOMENA:</b><br> 
                    Molimo Vas da obratite pažnju prilikom narudžbe. Dostava se zasebno plaća za svakog proizvođača.
                    </p>
                </div>
                <input type="submit" class="btn btn-success btn-lg" id="submitbtn" name="naruci" value="NARUČI!" disabled>

                <script>
                        function enableBtn(){
                            var checkbox = document.getElementById('uvijeti').checked;
                            var submitBtn = document.getElementById('submitbtn');

                            if (checkbox == true){
                                submitbtn.disabled = "";
                            } else {
                                submitbtn.disabled = "disabled";
                            }
                        }
                        
                </script>
            </div>
        </form>
        </div>
    </div>
    <hr>
</div>
@endsection