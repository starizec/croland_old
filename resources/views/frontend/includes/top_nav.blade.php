<header class="bg-dark d-none d-lg-block" style="width: 100%; position: fixed; z-index: 9;">
<div class="container">
  <div class="row">
    <div class="col-sm-4 m-auto d-none d-lg-block">
      <a href="/"><img class="logo" src="{{ asset('uploads/g5773.png') }}" alt=""></a>
  </div>        
    <div class="col-md-12 col-lg-8">
       <nav class="navbar navbar-expand-md navbar-dark bg-dark ">
        @if(Request::path() !== 'objave/5')
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item p-3">
                <a class="btn btn-clhr" href="/o-nama">O nama</a>
            </li>
            <li class="nav-item p-3">
                    @if(empty(session()->get('kosarica')))
                      <a class="btn btn-success" href="/shop/0"><i class="fa fa-shopping-cart"></i>
                        Trgovina
                      </a>
                    @else
                      <a class="btn btn-success" href="/shop/kosarica"><i class="fa fa-shopping-cart"></i> 
                        Košarica ({{ count(session()->get('kosarica')) }})
                      </a>
                    @endif
            </li>
        </ul>
        @endif
      </nav>

      <nav class="navbar navbar-expand-md navbar-dark bg-dark ">
          @if(Request::path() !== 'objave/5')
        
      <ul class="nav navbar-nav ml-auto">
      <li class="nav-item">
            <a class="nav-link" href="/shop/7">Pića </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/shop/8">Povrće </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/shop/9">Mesni Proizvodi </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/shop/10">Mliječni Proizvodi </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/shop/5">Začini </a>
          </li>
    </ul> 
    @endif
      </nav>
      </div>
    </div>
</header>