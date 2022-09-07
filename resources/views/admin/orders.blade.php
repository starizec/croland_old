@extends('admin.includes.admin_core')

@section('title')
    Narudžbe
@endsection

@section('core')
<div class="col-md-12">
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Popis narudžbi</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="card-body table-responsive p-0">
                <table class="table table-hover" id="myTable">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th></th>
                      <th>Ime i prezime</th>
                      <th>Adresa</th>
                      <th>Mjesto</th>
                      <th>PP</th>
                      <th>Email</th>
                      <th>Telefon</th>
                      <th>Status</th>
                      <th>Datum</th>
                      <th></th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($all_orders as $order)
                      <tr>
                          <td>{{ $order->id }}</td>
                          <td><a href="/admin/narudjba/{{ $order->id }}"><button class="btn btn-outline-secondary btn-sm"><i class="fa fa-eye"></i></button></a></td>
                          <td>{{ $order->ime }} {{ $order->prezime }} </td>
                          <td>{{ $order->adresa }}</td>
                          <td>{{ $order->mjesto }}</td>
                          <td>{{ $order->postanski_broj }}</td>
                          <td>{{ $order->email }}</td>
                          <td>{{ $order->telefon }}</td>
                          <td>
                              @if($order->status_id == 1)
                                <span class="badge badge-secondary">Obrada</span>
                              @elseif($order->status_id == 2)
                                <span class="badge badge-success">Poslano</span>
                              @elseif($order->status_id == 3)
                                <span class="badge badge-danger">>Stornirano</span>
                              @endif
                          </td>
                          <td>{{ date('d.m.Y', strtotime($order->created_at)) }}</td>
                          <td>
                              @if($order->status_id == 1)
                                <a href="/admin/order/status/2/{{ $order->id }}"><button class="btn btn-success">Završi</button></a>
                              @elseif($order->status_id == 2)
                                <a href="#!"><button class="btn btn-disabled"><i class="fa fa-check"></i> Završeno</button></a>
                              @elseif($order->status_id == 3)
                                <a href="#!"><button class="btn btn-disabled"><i class="fa fa-check"></i> Stornirano</button></a>
                              @endif
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
              </div>
</div>
</div>
</div>
@endsection