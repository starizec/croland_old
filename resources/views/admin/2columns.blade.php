@extends('admin.includes.admin_core')

@section('core')
<div class="row">
<div class="col-md-5">
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Sadržaj za {{ $vendor->naziv }}</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" action="/admin/vendor/sadrzajtwo/store" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="vendor_id" value="{{ $vendor->id }}">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Naslov</label>
                    <input type="text" class="form-control" name="naslov" required>
                  </div>

                  <!-- textarea -->
                  <div class="form-group">
                    <label>Lijevi stupac</label>
                    <textarea class="textarea form-control" id="textarea" placeholder="Enter text ..." name="lstupac"></textarea>
                  </div>

                  <div class="form-group">
                    <label>Desni stupac</label>
                    <textarea class="textarea form-control" id="textarea" placeholder="Enter text ..." name="dstupac"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Naslovna slika ili video</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="medij" required>
                        <label class="custom-file-label" for="exampleInputFile">Odaberi datoteku</label>
                      </div>
                    </div>
                  </div>
                  <div class="btn-group">
                    <input value="Spremi i dodaj 1 stupac" type="submit" class="btn btn-default" name="dodajjedan" >
                    <input value="Spremi i dodaj 2 stupca" type="submit" class="btn btn-default" name="dodajdva">
                    <input value="Gotovo" type="submit" class="btn btn-info" name="spremi">
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
        </div>
        <div class="col-md-7">
          <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Izgled</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                        <h1>{{ base64_decode( $vendor->naziv ) }}</h1>
                          <img style="width: 100%;" src="{{ asset('uploads')}}/{{ $vendor->naslovna_slika }}">
                          <p><b>Opis: </b>{!! base64_decode($vendor->opis) !!}</p>
                          <p><b>Adresa: </b>{{ base64_decode($vendor->adresa) }}</p>
                          <p><b>Mjesto: </b>{{ base64_decode($vendor->mjesto) }}</p>
                          <p><b>Pštanski broj: </b>{{ $vendor->postanski_broj }}</p>
                          <p><b>OIB: </b>{{ $vendor->oib }}</p>
                          <p><b>Lokacija: </b>{{ $vendor->lokacija }}</p>
                          <p><b>Email: </b>{{ $vendor->email }}</p>
                          <p><b>Telefon: </b>{{ $vendor->telefon }}</p>

                          @foreach($sadrzaj as $sadrzaj)
                          <h2>{{ base64_decode($sadrzaj->naslov) }}</h2>
                          <img style="width: 100%;" src="{{ asset('uploads')}}/{{ $sadrzaj->medij }}">
                          <p><b>Sadrzaj: </b>{!! base64_decode($sadrzaj->sadrzaj) !!}</p>
                          @endforeach

                        </div>
          </div>
        </div>
</div>
@endsection