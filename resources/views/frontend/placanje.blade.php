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
                    <input name="ime_kupca" type="text" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                    <label style="font-weight: bold;">Prezime</label>
                    <input name="prezime_kupca" type="text" class="form-control">
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
            <h1 class="naziv-proizvoda mt-40">Vaša narudžba</h1>
            <table class="table">
                <thead>                  
                    <tr>
                        <th width="80%">Proizvod</th>
                        <th width="20%">Ukupno</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($proizvodi as $proizvod)
                    <tr>
                        <td>
                            {{ $proizvod[0]->naziv }} <span style="font-weight: bold;">x
                                @foreach($kosarica as $id => $kos)
                                    @if($proizvod[0]->id == $id)
                                        {{ $kos }}</span>
                                    @endif
                                @endforeach
                        </td>
                        <td>
                        @php
                            $ukupno = [];
                            @endphp
                                @foreach($kosarica as $id => $kos)
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
                </tbody>
            </table>
            <div>
                <p>
                <input type="checkbox" name="uvijeti_koristenja" id="uvijeti" onClick="enableBtn()"> Pročitao/la sam i slažem se s uvjetima korištenja i odredbama web-stranice.
                </p>
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