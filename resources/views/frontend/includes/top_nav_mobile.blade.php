<nav class="navbar fixed-top navbar-dark bg-dark d-block d-lg-none" style="padding: .5rem 1rem; ">
        <a href="/"><img class="logo" src="{{ asset('uploads/g5773.png') }}" alt="" style="width: 240px; padding: 10px 0;"></a>
         @if(Request::path() !== 'objave/5')
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      @endif

      <div class="navbar-collapse collapse" id="navbarsExample01" style="">
        <ul class="navbar-nav mr-auto">
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
          <li class="nav-item" style="margin-bottom: 20px;">
            <a class="btn btn-clhr" href="/o-nama">O nama</a>
          </li>
          <li class="nav-item" style="margin-bottom: 20px;">
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
      </div>
    </nav>

    @if(!empty(session()->get('kosarica')))
       <a class="btn btn-success d-block d-lg-none" style="position: fixed; bottom: 10px; right: 10px; z-index: 99;" href="/shop/kosarica">
        Kreni na plaćanje <i class="fa fa-shopping-cart"></i> ({{ count(session()->get('kosarica')) }})
      </a>
    @endif