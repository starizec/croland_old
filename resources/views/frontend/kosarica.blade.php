@extends('frontend.includes.frontend_core')

@section('content')

<div class="container proizvod" style="background-color: white; padding-top: 130px;">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="naziv-proizvoda">Košarica</h1>
            <table class="table">
                <thead>                  
                    <tr>
                        <th></th>
                        <th>Naziv</th>
                        <th class="txt-align-center">Količina</th>
                        <th class="txt-align-center">Cijena</th>
                        <th class="txt-align-center">Ukupno</th>
                        <th class="txt-align-center"><i class="fa fa-trash"></i></th>
                    </tr>
                </thead>

                <tbody class="kosarica-tablica">
                    @foreach($proizvodi as $proizvod)
                        <tr>
                            <td class="kosarica-slika-proizvoda-td">
                                @foreach($slike_proizvoda as $key => $slika)
                                    @if($slika[0]->id_proizvoda == $proizvod[0]->id )
                                        <img class="kosarica-slika-proizvoda" src="{{ asset('uploads')}}/{{ $slika[0]->slika }}">
                                    @endif
                                @endforeach
                            </td>
                            <td class="kosarica-naziv-proizvoda-td"><a href="/shop/proizvod/{{ $proizvod[0]->id }}">{{ $proizvod[0]->naziv }}</a></td>
                            <td class="kosarica-kolicina-proizvoda-td txt-align-center">
                                <form role="form" action="/shop/add-to-cart" method="post">
                                {{ csrf_field() }}
                                    
                                    <input name="return_url" type="hidden" value="/shop/kosarica">
                                @foreach($kosarica as $id => $kos)
                                    @if($proizvod[0]->id == $id)
                                        <input name="kolicina" type="number" value="{{ $kos }}" class="qty-input">
                                    @endif
                                @endforeach
                            </td>
                            <td class="kosarica-cijena-proizvoda-td txt-align-center">{{ number_format($proizvod[0]->cijena, 2) }} KN</td>
                            <td class="kosarica-ukupno-proizvoda-td txt-align-center">
                                @foreach($kosarica as $id => $kos)
                                    @if($proizvod[0]->id == $id)
                                        {{ number_format($kos*$proizvod[0]->cijena, 2) }} KN
                                    @endif
                                @endforeach
                            </td>
                            <td class="kosarica-ukupno-proizvoda-td txt-align-center"><a href="#!"><i class="fa fa-minus"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
            <div class="row">
                <div class="col-lg-6">
                    <a class="btn btn-outline-danger" href="/shop/isprazni_kosaricu">OBRIŠI KOŠARICU</a>
                </div>
                <div class="col-lg-6" style="text-align: right;">
                    <input type="submit" class="btn btn-warning" name="azuriraj_kosaricu" value="AŽURIRAJ KOŠARICU">
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row mt-40" >
        <div class="col-lg-6">
            
        </div>
        <div class="col-lg-6">
            <h1 class="naziv-proizvoda">Sveukupno</h1>
            <table class="table">
                <tr>
                    <th>
                        Ukupno
                    </th>
                    <td>
                        @php
                            $ukupno = [];
                        @endphp
                        @foreach($proizvodi as $proizvod)
                            @foreach($kosarica as $id => $kos)
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
                <tr>
                    <th>
                        Popusti
                    </th>
                    <td>
                        0%
                    </td>
                </tr>
                <tr>
                    <th>
                        Ukupno
                    </th>
                    <td style="font-weight: bold;">
                        @php
                            $sveukupno = array_sum($ukupno) - (array_sum($ukupno) * 0 / 100);
                        @endphp

                        {{ number_format($sveukupno, 2) }} KN
                    </td>
                </tr>
            </table>
            <a class="btn btn-success btn-lg btn-block" href="/shop/placanje">KRENI NA PLAĆANJE</a>
        </div>
    </div>
    <hr>
</div>

@endsection