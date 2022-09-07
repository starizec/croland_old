@extends('admin.includes.admin_core')

@section('core')
<div class="row">
<div class="col-md-5">
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Unos novog vendora</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" action="/admin/vendor/store" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
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
                    <label for="exampleInputFile">Naslovna slika ili video</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputfile" name="naslovna_slika" onChange='getoutput(event)'>
                        <label class="custom-file-label" id="outputfile" for="exampleInputFile">Odaberi datoteku</label>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Youtube video</label>
                    <input type="text" class="form-control" name="youtube_link" id="myInput">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Kategorija/e</label>
                    <div class="form-group">
                      @foreach($kategorije as $kategorija)
                          <div class="checkbox">
                            <div>
                              <input type="checkbox" name="kategorija[]" value="{{ $kategorija->id }}">
                              {{ $kategorija->naziv }}
                            </div>
                        </div>
                      @endforeach
                    <hr>
                    <input type="text" class="form-control" name="nova_kategorija" placeholder="Dodaj novu kategoriju">
                  </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Oznake</label>
                    <div class="form-group">
                      @foreach($oznake as $oznaka)
                          <div class="checkbox">
                            <div>
                              <input type="checkbox" name="oznake[]" value="{{ $oznaka->id }}">
                              {{ $oznaka->naziv }}
                            </div>
                        </div>
                      @endforeach
                    <hr>
                    <input type="text" class="form-control" name="nova_oznaka" placeholder="Dodaj novu oznaku">
                  </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Dodatni sadržaj</label>
                    <div class="form-group">
                      @foreach($icons as $icon)
                          <div class="checkbox">
                            <div>
                              <input type="checkbox" name="icons[{{ $icon->id }}]" value="{{ $icon->id }}">
                              <input type="text" name="icon[{{ $icon->id }}]">
                              <i class="{{ $icon->fa_icon }}"></i> {{ $icon->icon_text }}
                            </div>
                        </div>
                      @endforeach
                  </div>
                  </div>

                  <div class="form-group">
                    <label>Adresa</label>
                    <input type="text" class="form-control" name="adresa" required>
                  </div>

                  <div class="form-group">
                    <label>Mjesto</label>
                    <input type="text" class="form-control" name="mjesto" required>
                  </div>

                  <div class="form-group">
                    <label>Poštanski broj</label>
                    <input type="text" class="form-control" name="postanski_broj" required>
                  </div>

                  <div class="form-group">
                    <label>Lokacija</label>
                    <input type="text" class="form-control" name="lokacija" required>
                  </div>

                  <div class="form-group">
                    <label>OIB</label>
                    <input type="text" class="form-control" name="oib" required>
                  </div>

                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" required>
                  </div>

                  <div class="form-group">
                    <label>Telefon</label>
                    <input type="text" class="form-control" name="telefon" required>
                  </div>
                  <div class="btn-group">
                    <input value="Dodaj sadržaj" type="submit" class="btn btn-default" name="jedanstupac">
                    <input value="Gotovo" type="submit" class="btn btn-info" name="gotovo">
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
        </div>

        <div class="col-md-7">
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Popis vendora</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover" id="myTable">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Naziv</th>
                      <th>Mjesto</th>
                      <th>OIB</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($vendori as $vendor)
                    <tr>
                      <td>{{ $vendor->id }}</td>
                      <td>{{ base64_decode($vendor->naziv)}}</td>
                      <td>{{ base64_decode($vendor->mjesto) }}</td>
                      <td>{{ $vendor->oib }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
        </div>
</div>
</div>
<script>
    function myFunction() {
     
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
    
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        } 
      }
    }
    </script>

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