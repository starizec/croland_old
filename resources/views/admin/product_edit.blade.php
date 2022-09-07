@extends('admin.includes.admin_core')

@section('core')

<div class="row">
<div class="col-md-5">
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Izmjena proizvoda</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" action="/admin/proizvod/update" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" value="{{ $product->id }}" name="product_id">
                <input type="hidden" value="{{ request()->path() }}" name="return_path">
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Vendor</label>
                    <select name="vendor_id" class="form-control" id="exampleFormControlSelect1">
                      @foreach($vendors as $vendor)
                        <option value="{{ $vendor->id }}"
                          @if($product->vendor_id == $vendor->id)
                            selected
                          @endif
                        >{{ base64_decode($vendor->naziv) }}</option>
                      @endforeach
                    </select>
                  </div>
                  <!-- text input -->
                  <div class="form-group">
                    <label>Naziv</label>
                    <input value="{{ $product->naziv }}" type="text" class="form-control" name="naziv" id="myInput" onkeyup="myFunction()" required>
                  </div>

                  <!-- textarea -->
                  <div class="form-group">
                    <label>Opis</label>
                    <textarea class="textarea form-control" id="textarea" placeholder="Enter text ..." style="styles to copy to the iframe" name="opis">{!! $product->opis !!}</textarea>
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
                    <input value="{{ $product->cijena }}"  type="number" class="form-control" name="cijena" step=any required>
                  </div>

                  <div class="form-group">
                    <label>Akcijska cijena</label>
                    <input value="{{ $product->cijena_popust }}"" type="number" class="form-control" name="cijena_popust" step=any>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Kategorija/e</label>
                    <div class="form-group">
                        @foreach($categories as $cat)
                          <div class="checkbox">
                            <input type="checkbox" name="kategorija[]" value="{{ $cat->id }}"
                            @foreach($product->categories as $product_category)
                                @if($cat->id == $product_category->id_kategorije)
                                    {{ 'checked' }}
                                @endif
                            @endforeach
                            >
                            {{ $cat->naziv }}
                          </div>
                        @endforeach
                        <hr>
                  </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Oznaka/e</label>
                    <div class="form-group">
                        @foreach($tags as $tag)
                          <div class="checkbox">
                            <input type="checkbox" name="oznake[]" value="{{ $tag->id }}"
                              @foreach($product_tags as $product_tag)
                                @if($tag->id == $product_tag->tag_id)
                                    {{ 'checked' }}
                                @endif
                              @endforeach
                            >
                            {{ $tag->naziv }}
                          </div>
                        @endforeach
                        <hr>
                  </div>
                  </div>

                  <div class="btn-group">
                    <input value="Izmjeni" type="submit" class="btn btn-info" name="gotovo">
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
        </div>



<div class="col-md-5">
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Galerija</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                    @foreach($product->images as $image)
                    <form action="/admin/proizvod/image/delete" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{ $image->id }}" name="img_id">
                    <input type="hidden" value="{{ request()->path() }}" name="return_path">
                        <div class="col-lg-12"><img class="col-lg-12" src="{{ asset('uploads') }}/{{ $image->slika }}"></div>
                        <br>
                        <div class="col-lg-12"><input type="submit" value="Obriši" class="btn btn-danger"></div>
                        <hr>
                    </form>
                    @endforeach
              </div>
</div>
</div>






</div>


@endsection