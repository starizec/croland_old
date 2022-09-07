<div class="row">
    <div class="col-lg-6">
        <h4>{!! $category_name !!}</h4>
    </div>
    @if(isset($category_id))
        <div class="col-lg-6">
            <span>Poredaj po:</span>
            <a href="/shop/{{ $category_id }}/zadano" type="button" class="btn btn-light">Zadano</a>
            <a href="/shop/{{ $category_id }}/najskuplje" type="button" class="btn btn-light">Najskuplji prvo</a>
            <a href="/shop/{{ $category_id }}/najjeftinije" type="button" class="btn btn-light">Najjeftiniji prvo</a>
        </div>
    @endif
</div>