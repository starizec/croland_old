@extends('admin.includes.admin_core')

@section('title')
    Narudžba
@endsection

@section('core')
<div class="row">
<div class="col-md-6">
<div class="card">
            <div class="card-header">
            <h3 class="card-title">Narudžba #{{ $buyer->id }}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <div class="card-body table-responsive p-0">
                Ime i prezime: <b>{{ $buyer->ime }} {{ $buyer->prezime }}<br></b>
                Adresa: <b>{{ $buyer->adresa }}<br></b>
                Poštanski broj: <b>{{ $buyer->postanski_broj }}<br></b>
                Mjesto: <b>{{ $buyer->mjesto }}<br></b>
                Email: <b>{{ $buyer->email }}<br></b>
                Telefon: <b>{{ $buyer->telefon }}<br></b>
                Napomena: <b>{{ $buyer->napomena }}<br></b>
                <hr>
                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                    <a href="/admin/order/status/2/{{ $buyer->id }}"><button type="button" class="btn btn-success">Završi</button></a>
                    <div class="btn-group" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        </button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                            <a class="dropdown-item" href="#">Storniraj</a>
                            <a class="dropdown-item" href="/admin/narudjbe/obrisi/{{ $buyer->id }}">Obriši</a>
                        </div>
                    </div>
                    </div>
            </div>
            </div>
</div>
</div>
<div class="col-md-6">
<div class="card">
            <div class="card-header">
            <h3 class="card-title">Proizvodi</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover" id="myTable">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Naziv</th>
                      <th>Cijena</th>
                      <th>Komada</th>
                      <th>Ukupno</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($products as $product)
                      <tr>
                          <td>
                              {{ $product[0]->id }}
                          </td>
                          <td>
                              {{ $product[0]->naziv }}
                          </td>
                          <td>
                              {{ $product[0]->cijena }} KN
                          </td>
                          <td>
                          @foreach($qty as $key => $value)
                                @if($key == $product[0]->id)
                                    {{ $value }}
                                @endif
                            @endforeach
                          </td>
                          <td>
                          @foreach($qty as $key => $value)
                                @if($key == $product[0]->id)
                                    {{  $value*$product[0]->cijena }}
                                @endif
                            @endforeach
                          </td>
                      </tr>
                @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            @php
                                $ukupno = [];
                            @endphp
                            
                            @foreach($products as $product)
                                @foreach($qty as $key => $value)
                                    @php
                                        $ukupno[] = $product[0]->cijena*$value;
                                    @endphp
                                @ednforeach
                            @endforeach

                            {{ var_dump($ukupno) }}
                        </td>
                    </tr>
                  </tbody>
            </div>
            </div>
</div>
</div>
</div>
@endsection