@extends('frontend.includes.frontend_core')

@section('content')
<div class="container proizvod" style="background-color: white; padding-top: 130px;">
    <div class="row">
        <div class="col-lg-6">
            <h1 class="naziv-proizvoda">Narudžba zaprimljena</h1>
            <hr>
            <div class="">
                Broj narudžbe: <b>{{ $order->id }}</b><br>
                Datum: <b>{{ date('d.m.Y', strtotime($order->created_at)) }}</b><br>
                Kupac: <b>{{ $order->ime }} {{ $order->prezime }}</b><br>
                Adresa: <b>{{ $order->adresa }}, {{ $order->postanski_broj }} {{ $order->mjesto }}</b><br>
                Email: <b>{{ $order->email }}</b><br>
                Telefon: <b>{{ $order->telefon }}</b><br>
                Napomena: 
                @if(empty($order->napomene))
                    <b>Nema</b>
                @else
                    <b>{{ $order->napomene }}</b>
                @endif
                <br>

           </div>
        
           <div class="col-lg-12">
            <h1 class="naziv-proizvoda mt-40">Vaša narudžba</h1>
            @foreach($vendor as $vendor)
            @php
                $total_by_vendor = array();
                $total_by_product = array();
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
                                            @foreach(unserialize($order->proizvodi_ids) as $id => $qty)
                                                @if($product['id'] == $id)
                                                    {{ $qty }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach(unserialize($order->proizvodi_ids) as $id => $qty)
                                                @if($product['id'] == $id)
                                                    @php
                                                        $total[] = $qty*$product['cijena'];
                                                        $total_by_vendor[] = $qty*$product['cijena'];
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
    </div>
    <hr>
</div>
@endsection