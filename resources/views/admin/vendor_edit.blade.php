@extends('admin.includes.admin_core')

@section('core')
<div class="row">
<div class="col-md-5">
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Izmjena vendora <a style="float: right; color: red; font-size:16px;" href="/admin/vendor/delete/{{ $vendor->id }}"><i class="fa fa-trash"></i></a></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" action="/admin/vendor/edit/update" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $vendor->id }}">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Naziv</label>
                    <input type="text" value="{{ base64_decode($vendor->naziv) }}" class="form-control" name="naziv" id="myInput" onkeyup="myFunction()">
                  </div>

                  <!-- textarea -->
                  <div class="form-group">
                    <label>Opis</label>
                    <textarea class="textarea form-control" id="textarea" placeholder="Enter text ..." style="styles to copy to the iframe" name="opis">{{ base64_decode($vendor->opis) }}</textarea>
                  </div>

                  
                  <div class="form-group">
                    <label for="exampleInputFile">Naslovna slika ili video</label>
                    <img src="{{ asset('uploads')}}/{{ $vendor->naslovna_slika }}" style="width: 100%; height: auto;">
                    <hr>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputfile" name="naslovna_slika" onChange='getoutput(event)'>
                        <label class="custom-file-label" id="outputfile" for="exampleInputFile">{{ $vendor->naslovna_slika }}</label>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Kategorija/e</label>
                    <div class="form-group">
                    @foreach($kategorije as $kategorija)
                        <div class="checkbox">
                          <div>
                            <input type="checkbox" name="kategorija[]" value="{{ $kategorija->id }}"
                              @foreach($kategorije_vendora as $kat_ven)
                                @if($kat_ven->id_kategorije == $kategorija->id)
                                    {{ 'checked' }}
                                @endif
                              @endforeach
                            >
                            {{ $kategorija->naziv }}
                          </div>
                      </div>
                    @endforeach
                </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Oznake</label>
                    <div class="form-group">
                    @foreach($oznake as $oznaka)
                        <div class="checkbox">
                          <div>
                            <input type="checkbox" name="oznake[]" value="{{ $oznaka->id }}"
                              @foreach($oznake_vendora as $ozn_ven)
                                @if($ozn_ven->tag_id == $oznaka->id)
                                    {{ 'checked' }}
                                @endif
                              @endforeach
                            >
                            {{ $oznaka->naziv }}
                          </div>
                      </div>
                    @endforeach
                </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Dodatni sadržaj</label>
                    <div class="form-group">
                    @if($icons)
                      @foreach($icons as $icon)
                            <div class="checkbox">
                              <div>
                                <input type="checkbox" name="icons[{{ $icon->id }}]" value="{{ $icon->id }}"
                                @if(unserialize($vendor->icone) != '0')
                                  @foreach(unserialize($vendor->icone) as $key => $value)
                                    @if($key == $icon->id)
                                      {{ 'checked' }}
                                    @endif
                                  @endforeach
                                @endif
                                >
                                <input type="text" name="icon[{{ $icon->id }}]" value=
                                @if(unserialize($vendor->icone) != '0')
                                  @foreach(unserialize($vendor->icone) as $key => $value)
                                    @if($key == $icon->id)
                                      "{{ $value }}"
                                    @endif
                                  @endforeach
                                @endif
                                >
                                <i class="{{ $icon->fa_icon }}"></i> {{ $icon->icon_text }}
                              </div>
                          </div>
                        @endforeach
                      @endif
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Adresa</label>
                    <input type="text" class="form-control" name="adresa" value="{{ base64_decode($vendor->adresa) }}">
                  </div>

                  <div class="form-group">
                    <label>Mjesto</label>
                    <input type="text" class="form-control" name="mjesto" value="{{ base64_decode($vendor->mjesto) }}">
                  </div>

                  <div class="form-group">
                    <label>Poštanski broj</label>
                    <input type="text" class="form-control" name="postanski_broj" value="{{ $vendor->postanski_broj }}">
                  </div>

                  <div class="form-group">
                    <label>Lokacija</label>
                    <input type="text" class="form-control" name="lokacija" value="{{ $vendor->lokacija }}">
                  </div>

                  <div class="form-group">
                    <label>OIB</label>
                    <input type="text" class="form-control" name="oib" value="{{ $vendor->oib }}">
                  </div>

                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" value="{{ $vendor->email }}"> 
                  </div>

                  <div class="form-group">
                    <label>Telefon</label>
                    <input type="text" class="form-control" name="telefon" value="{{ $vendor->telefon }}">
                  </div>
                  <div class="btn-group">
                    <input value="Izmjeni" type="submit" class="btn btn-info" name="izmjeni">
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
        </div>
</div>
</div>

  @if($sadrzaj)
    @foreach($sadrzaj as $sadrzaj)
      <div class="col-md-5">
        <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">{{ base64_decode($sadrzaj->naslov) }}</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <form role="form" action="/admin/vendor/sadrzajone/edit/update" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="sadrzaj_id" value="{{ $sadrzaj->id }}">
                    <input type="hidden" name="vendor_id" value="{{ $sadrzaj->vendor_id }}">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Naslov</label>
                        <input type="text" class="form-control" name="naslov" value="{{ base64_decode($sadrzaj->naslov) }}" required>
                      </div>

                      <!-- textarea -->
                      <div class="form-group">
                        <label>Sadržaj</label>
                        <textarea class="textarea form-control" id="textarea" placeholder="Enter text ..." style="styles to copy to the iframe" name="sadrzaj">
                          {{ base64_decode($sadrzaj->sadrzaj) }}
                        </textarea>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputFile">Naslovna slika ili video</label>
                        <img src="{{ asset('uploads')}}/{{ $sadrzaj->medij }}" style="width: 100%; height: auto;">
                        <hr>
                        <div class="input-group">
                          <div class="custom-file">
                          <input type="file" class="custom-file-input" id="" name="medij" >
                        <label class="custom-file-label" id="" for="exampleInputFile">{{ $sadrzaj->medij }}</label>
                          </div>
                        </div>
                      </div>
                      <div class="btn-group">
                        <input value="Izbriši" type="submit" class="btn btn-danger" name="Izbriši">
                        <input value="Izmjeni" type="submit" class="btn btn-info" name="Izmjeni">
                      </div>
                    </form>
                  </div>
                  <!-- /.card-body -->
                </div>
            </div>
    @endforeach
  @endif

<script>
    function getoutput(event) {

    if (!event || !event.target || !event.target.files || event.target.files.length === 0) {
      return;
    }

    const name = event.target.files[0].name;
    const lastDot = name.lastIndexOf('.');

    const fileName = name.substring(0, lastDot);
    const ext = name.substring(lastDot + 1);

    const fileNameAndExt = fileName + '.' + ext;

    outputfile.innerHTML = fileNameAndExt;

    }
    </script>
@endsection