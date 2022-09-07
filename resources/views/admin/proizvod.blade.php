@extends('admin.includes.admin_core')

@section('core')

<div class="row">
<div class="col-md-5">
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Dodavanje proizvoda</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" action="/admin/proizvod/store" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                  
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Vendor</label>
                    <select name="vendor_id" class="form-control" id="exampleFormControlSelect1">
                      @foreach($vendori as $vendor)
                        <option value="{{ $vendor->id }}"
                          @if($id_vendora == $vendor->id)
                            selected
                          @endif
                        >{{ base64_decode($vendor->naziv) }}</option>
                      @endforeach
                    </select>
                  </div>
                  <!-- text input -->
                  <div class="form-group">
                    <label>Naziv</label>
                    <input type="text" class="form-control" name="naziv" id="myInput" onkeyup="myFunction()" required>
                  </div>

                  <!-- textarea -->
                  <div class="form-group">
                    <label>Opis</label>
                    <textarea class="textarea form-control" id="textarea" placeholder="Enter text ..." style="styles to copy to the iframe" name="opis"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Slike</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputfile" name="slike[]" onChange='getoutput(event)' multiple>
                        <label class="custom-file-label" id="outputfile" for="exampleInputFile">Odaberi datoteku</label>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Cijena</label>
                    <input type="number" class="form-control" name="cijena" step=any required>
                  </div>

                  <div class="form-group">
                    <label>Akcijska cijena</label>
                    <input type="number" class="form-control" name="cijena_popust" step=any>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Kategorija/e</label>
                    <div class="form-group">
                        @foreach($kategorije as $kat)
                          <div class="checkbox">
                            <input type="checkbox" name="kategorija[]" value="{{ $kat->id }}">
                            {{ $kat->naziv }}
                          </div>
                        @endforeach
                        <hr>
                    <input type="text" class="form-control" name="nova_kategorija" placeholder="Dodaj novu kategoriju">
                  </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Oznaka/e</label>
                    <div class="form-group">
                        @foreach($tags as $tag)
                          <div class="checkbox">
                            <input type="checkbox" name="oznake[]" value="{{ $tag->id }}">
                            {{ $tag->naziv }}
                          </div>
                        @endforeach
                        <hr>
                    <input type="text" class="form-control" name="new_tag" placeholder="Dodaj novu oznaku">
                  </div>
                  </div>

                  <div class="btn-group">
                    <input value="Dodaj" type="submit" class="btn btn-info" name="gotovo">
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
        </div>
</div>
</div>

@endsection