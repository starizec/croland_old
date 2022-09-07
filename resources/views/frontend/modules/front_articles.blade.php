<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{ asset('uploads/Saran_u_rasljama_2__tz_bilje.jpg') }}" alt="First slide">
      <div class="carousel-content">
        <h1 class="drop-shadow">Prisjećamo se starih i izvornih jela</h1>
        <a class="btn btn-clhr" href="/objave/9">Detaljnije</a>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ asset('uploads/kolonia-ernest.jpg') }}" alt="Second slide">
      <div class="carousel-content">
        <h2 class="drop-shadow">Kolonija kipara naivaca Ernestinovo</h2>
        <a class="btn btn-clhr" href="/objave/6">Detaljnije</a>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ asset('uploads/izrada-djakovo.jpg') }}" alt="Third slide">
      <div class="carousel-content">
        <h2 class="drop-shadow">Izrada cvjetnih zastavica - Svi na piknik!</h2>
         <a class="btn btn-clhr" href="/objave/7">Detaljnije</a>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
<!--   <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
      <img src="https://pbs.twimg.com/profile_images/905183271046193153/q_P1KBUJ_400x400.jpg" class="img-fluid"/>
    </li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1">
      <img src="https://pbs.twimg.com/profile_images/905183271046193153/q_P1KBUJ_400x400.jpg" class="img-fluid"/>
    </li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2">
      <img src="https://pbs.twimg.com/profile_images/905183271046193153/q_P1KBUJ_400x400.jpg" class="img-fluid"/>
    </li>
  </ol> -->
  <div class="container pt-4 pb-5">
    <div class="row carousel-indicators">
      <div class="col-md-4 item">
        <img src="{{ asset('uploads/vinoteka-osijek.jpg') }}" class="img-fluid" data-target="#carouselExampleIndicators" data-slide-to="0"/>
      </div>
      <div class="col-md-4 item">
        <img src="{{ asset('uploads/kolonia-ernest.jpg') }}" class="img-fluid" data-target="#carouselExampleIndicators" data-slide-to="1"/>
      </div>
      <div class="col-md-4 item">
        <img src="{{ asset('uploads/izrada-djakovo.jpg') }}" class="img-fluid" data-target="#carouselExampleIndicators" data-slide-to="2"/>
      </div>
    </div>
  </div>
</div>