@extends('admin.includes.admin_core')

@section('core')
<div class="row">
<div class="col-md-5">
<div class="card">
<div class="card-body">
<div class="box box-success">
            <div class="box-body">
              <input class="form-control input-lg" type="text" placeholder="Pretraživanje proizvoda" id="myInput" onkeyup="myFunction()">
            </div>
            <!-- /.box-body -->
          </div>
          </div>
          </div>
          </div>
<div class="col-md-12">
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Popis proizvoda</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="card-body table-responsive p-0">
                <table class="table table-hover" id="myTable">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th></th>
                      <th>Naziv</th>
                      <th>Cijena</th>
                      <th>Cijena popust</th>
                      <th>Prodaje</th>
                      <th>Izrađeno</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($products as $product)
                      <tr>
                        <td>{{ $product->id }}</td>
                        <td><img src="{{ asset('uploads') }}/{{ $product->slika }}" width="50" height="50"></td>
                        <td>{{ $product->naziv }}</td>
                        <td>{{ $product->cijena }}</td>
                        <td>{{ $product->cijena_popust }}</td>
                        <td>{{ $product->vendor }}</td>
                        <td>{{ date('d-m-Y', strtotime($product->created_at)) }}</td>
                        <td><a href="/admin/proizvod/edit/{{ $product->id }}"><i class="fa fa-edit"></i></a><td>
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
        td = tr[i].getElementsByTagName("td")[2];
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