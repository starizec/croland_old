@extends('emails.core')

@section('content')
<div class="container proizvod">
    <div class="row">
        <div class="col-lg-6">
            <h1 class="naziv-proizvoda">Narudžba zaprimljena</h1>
            <hr>
            <div>
                Vaša narudžba je zaprimljena te je prosljeđena prodavaču. Proizvodi će biti poslani u najkraćem roku.
            </div>
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
            <table class="table">
                <thead>                  
                    <tr>
                        <th width="80%">Proizvod</th>
                        <th width="20%">Ukupno</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $proizvod)
                    <tr>
                        <td>
                            {{ $proizvod[0]->naziv }} 
                            <span style="font-weight: bold;">x
                                @foreach(unserialize($order->proizvodi_ids) as $id => $kos)
                                    @if($proizvod[0]->id == $id)
                                        {{ $kos }}                            
                                    @endif
                                @endforeach
                            </span>
                        </td>
                        <td>
                        @php
                            $ukupno = [];
                        @endphp
                                @foreach(unserialize($order->proizvodi_ids) as $id => $kos)
                                    @if($proizvod[0]->id == $id)
                                        @php
                                            $ukupno[] = $kos*$proizvod[0]->cijena;
                                        @endphp
                                    @endif
                                @endforeach

                        {{ number_format(array_sum($ukupno), 2) }} KN
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td style="background-color: #ededed; font-weight: bold;">
                            UKUPNO
                        </td>
                        <td style="background-color: #ededed; font-weight: bold;">
                            @php
                                $ukupno = [];
                            @endphp
                            @foreach($products as $proizvod)
                                @foreach(unserialize($order->proizvodi_ids) as $id => $kos)
                                    @if($proizvod[0]->id == $id)
                                        @php
                                            $ukupno[] = $kos*$proizvod[0]->cijena;
                                        @endphp
                                    @endif
                                @endforeach
                            @endforeach

                            {{ number_format(array_sum($ukupno), 2) }} KN
                        </td>
                    </tr>
                </tbody>
            </table>
            <hr>
            Dostava nije uračunata u cijenu te je određuje prodavač.
    </div>
    <hr>
    <div>

    </div>

</div>
@endsection