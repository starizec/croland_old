@extends('admin.includes.admin_core')

@section('core')
<div class="row">
<div class="col-md-5">
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Dodaj novu kategoriju</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" action="/admin/vendor/kategorije/store" method="post">
                {{ csrf_field() }}
                  <!-- text input -->
                  <div class="form-group">
                    <label>Naziv</label>
                    <input type="text" name="naziv" class="form-control">
                  </div>
                
                <div class="btn-group">
                    <input value="Spremi" type="submit" class="btn btn-info">
                  </div>
              </div>
              <!-- /.card-body -->
              </form>
            </div>
        </div>
        <div class="col-md-7">
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Popis kategorija</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Naziv</th>
                      <th>Stvoreno</th>
                      <th>Korišteno</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($kategorije as $kategorija)
                      <tr>
                        <td>{{ $kategorija->id }}</td>
                        <td>{{ $kategorija->naziv }}</td>
                        <td>{{ $kategorija->created_at }}</td>
                        <td>u izradi</td>
                        <td><a href="/admin/vendor/kategorije/delete/{{ $kategorija->id }}"><i style="color: red;" class="fa fa-trash"></i></a><td>
                      </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
        </div>
</div>
@endsection