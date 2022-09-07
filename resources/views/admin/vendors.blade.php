@extends('admin.includes.admin_core')

@section('core')
<div class="row">
<div class="col-md-5">
<div class="card">
<div class="card-body">
<div class="box box-success">
            <div class="box-body">
              <input class="form-control input-lg" type="text" placeholder="Pretraživanje vendora" id="myInput" onkeyup="myFunction()">
            </div>
            <!-- /.box-body -->
          </div>
          </div>
          </div>
          </div>
<div class="col-md-12">
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Popis vendora</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="card-body table-responsive p-0">
                <table class="table table-hover" id="myTable">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Naziv</th>
                      <th>Adresa</th>
                      <th>Mjesto</th>
                      <th>PP</th>
                      <th>Email</th>
                      <th>Telefon</th>
                      <th>Izrađeno</th>
                      <th>Izmjenjeno</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($vendors as $vendor)
                      <tr>
                        <td>{{ $vendor->id }}</td>
                        <td>{{ base64_decode($vendor->naziv) }}</td>
                        <td>{{ base64_decode($vendor->adresa) }}</td>
                        <td>{{ base64_decode($vendor->mjesto) }}</td>
                        <td>{{ $vendor->postanski_broj }}</td>
                        <td>{{ $vendor->email }}</td>
                        <td>{{ $vendor->telefon }}</td>
                        <td>{{ $vendor->created_at }}</td>
                        <td>{{ $vendor->updated_at }}</td>
                        @if($vendor->favorite == 0)
                          <td><a href="/admin/vendor/{{ $vendor->id }}/favorite"><i  style="color: grey;" class="fa fa-star"></i></a><td>
                        @elseif($vendor->favorite == 1)
                          <td><a href="/admin/vendor/{{ $vendor->id }}/unfavorite"><i  style="color: #ffcc00;" class="fa fa-star"></i></a><td>
                        @endif
                        <td><a href="/admin/proizvod/{{ $vendor->id }}"><i  style="color: green;" class="fa fa-cart-plus"></i></a><td>
                        <td><a href="/admin/vendor/edit/{{ $vendor->id }}"><i class="fa fa-edit"></i></a><td>
                      </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
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
@endsection