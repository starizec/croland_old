<div class="top-navbar">
    <div>
      <a href="/"><img class="logo" src="{{ asset('uploads/loogo.png') }}"></a>
    </div>
    <div class="nav-link d-none d-xl-block">
      <a class="nav-link-a" href="/kategorija/8">Gastronomija</a>
      <a class="nav-link-a" href="/kategorija/7">Smještaj</a>
      <a class="nav-link-a" href="/kategorija/10">Zabava</a>
    </div>

    <div class="nav-link-right float-right-nav d-none d-xl-block">
      <a class="btn btn-clhr" href="/o-nama">O nama</a>
      <a class="btn btn-success" href="/shop/kosarica"><i class="fa fa-shopping-cart"></i> Košarica(
        @if(empty(session()->get('kosarica')))
          0
        @else
          {{ count(session()->get('kosarica')) }}
        @endif
      )</a>
    </div>

    <div  class="">
      <div class="menu"> <span></span> </div>
        <nav id="nav">
            <ul class="main">
                <li class="btn btn-clhr d-md-none d-lg-none">O nama</li>
                <li class="naslov_menija d-md-none d-lg-none">Regije</li>
                <li class="d-md-none d-lg-none"><a href="/regija/1">Slavonija i Baranja</a></li>
                <li class="d-md-none d-lg-none"><a href="/regija/2">Središnja Hrvatska</a></li>
                <li class="naslov_menija d-md-none d-lg-none">Kategorije</li>
                <li class="d-md-none d-lg-none"><a href="/kategorija/8">Gastronomija</a></li>
                <li class="d-md-none d-lg-none"><a href="/kategorija/7">Smještaj</a></li>
                <li class="d-md-none d-lg-none"><a href="/kategorija/10">Zabava</a></li>
                <li class="naslov_menija">Uvijeti korištenja</li>
                <li><a href="!#">Uvijeti i pravila korištenja</a></li>
                <li><a href="!#">Izjava o privatnosti</a></li>
                <li><a href="!#">Uputstva i savjeti</a></li>
            </ul>
        </nav>
      <div class="overlay"></div>
    </div>
</div>