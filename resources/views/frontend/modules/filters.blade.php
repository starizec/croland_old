@if(isset($filter_regije) || isset($filter_kategorije))
<form action="/search" method="POST" name="search" id="search">
    {{ csrf_field() }}  
    <div class="form-inline">
        <div class="form-group col-lg-5" style="padding-left: 0;">
            <label for="search" class="sr-only">Pretraživanje</label>
            <input class="form-control col-lg-12" id="search" placeholder="Pretraživanje">
        </div>
        <button class="btn btn-info" form="search" id="search-button"><i class="fa fa-search"></i> Pretraži</button>
        <div class="" style="margin-left: 10px;">
            <a class="btn btn-outline-info" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                <i class="fa fa-angle-up"></i>
            </a>
        </div>
    </div>
</form>
<form action="/filters" method="POST" name="filters" id="filters">
 <div class="collapse show" id="collapseExample">
  <div class="card card-body" style="margin-top: 5px;">
    <div>
        @if(isset($filter_regije))
            <h5 class="filters-title">Regija</h5>
            @foreach($filter_regije as $regija)
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" name="regija[]" type="checkbox" id="inlineCheckboxRegija{{ $regija->id }}" value="{{ $regija->id }}" checked>
                    <label class="custom-control-label" for="inlineCheckboxRegija{{ $regija->id }}">{{ $regija->naziv }}</label>
                </div>
            @endforeach
        @endif

        @if(isset($filter_kategorije))
            <h5 class="filters-title">Kategorija</h5>
            @foreach($filter_kategorije as $kategorija)
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" name="kategorija[]" type="checkbox" id="inlineCheckboxKategorija{{ $kategorija->id }}" value="{{ $kategorija->id }}" checked>
                    <label class="custom-control-label" for="inlineCheckboxKategorija{{ $kategorija->id }}">{{ $kategorija->naziv }}</label>
                </div> 
            @endforeach
        @endif
        
</div>
<button style="width: 110px; margin-top: 10px;" class="btn btn-info" form="filters" id="search-button"><i class="fa fa-search"></i> Pretraži</button>
</form>
</div>
</div>
@endif