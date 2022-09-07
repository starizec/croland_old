@extends('frontend.includes.frontend_core')

@section('content')
<header class="masthead" data-toggle="modal" data-target=".bs-example-modal-lg" style="background-image: url({{ asset('images/test1.jpg') }});">
    <div class="texture-handler top"><div class="texture top-texture"></div></div>
        <div class="container h-720">
        <div class="intro-text" style="padding-top: 120px; padding-bottom: 120px;">
            <h1 class="intro-heading text-uppercase vendor-name drop-shadow" style="font-size: 60px; margin-bottom: 0; margin-top: 120px;">CROLAND.HR <br>INTERNET TRGOVINA</h1>
            <p><b>✓ OGLASI SE   ✓ PRODAJ   ✓ ZARADI</b></p>
        </div>
        </div>
        <div class="texture-handler bottom"><div class="texture bottom-texture"></div></div>
    </header>
<section class="page-section" id="o-nama">
        <div class="container">
        <div class="row">
            <div class="col-lg-6">
            <h2>O nama</h2>

                <p>• Započnite sa <b>jednostavnom</b> online prodajom svojih proizvoda i počnite zarađivati<br></p>
                <p>• Za <b>promotivnu cijenu</b> Croland.hr vam omogućava da prodate svoje proizvode u cijeloj HR<br></p>
                <p>• <b>Sva zaradi ide VAMA</b>, CroLand.hr <b>ne uzima</b> nikakvu proviziju od vaše prodaje<br></p>
                <p>• Kupci se javljaju <b>izravno vama</b> i šalju vam narudžbe za vaše proizvode, na vama je samo da ih pošaljete i zaradite<br></p>
                <p>• Prodaja i oglašavanje djeluje na <b>nacionalnoj razini</b> uz <b>službenu potporu</b> Osječko-baranjske županije<br></p>

            </div>
            <div class="col-lg-6">
                <h2>Kontaktirajte nas</h2>
    <form id="contactForm" name="sentMessage" novalidate="novalidate" action="/send-contact-email" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="to_email" value="info@croland.hr">
          <input type="hidden" name="return_path" value="objave/5">
              <div class="form-group">
                  <input class="form-control" name="name" id="name" type="text" placeholder="Ime *" required="required" data-validation-required-message="Please enter your name." required>
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <input class="form-control" name="from_email" id="email" type="email" placeholder="Email *" required="required" data-validation-required-message="Please enter your email address." required>
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <input class="form-control" name="phone" id="phone" type="tel" placeholder="Broj telefona" required="required" data-validation-required-message="Please enter your phone number.">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" id="message" placeholder="Upit *" required="required" data-validation-required-message="Please enter a message." required></textarea>
                  <p class="help-block text-danger"></p>
                  <button id="sendMessageButton" class="btn btn-clhr text-uppercase" type="submit">Pošalji</button>
                </div>
          </form>
          <h2 style="text-align: center;">ili nazovite</h2>
          <p style="text-align: center; font-size: 3rem; color: #940D0D; font-weight: 600;">091/529-1809</p>
            </div>
        </div>
        </div>
    </section>

    <section class="bg-light page-section" id="team">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Naši klijenti</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="team-member">
            <img class="mx-auto rounded-circle" src="{{ asset('uploads/izjava1.jpg') }}" alt="">
            <h4>Nikola Tonković</h4>
            <p class="text-muted">OPG Nikola Tonković</p>
            <p class="text-muted">„Imam višegodišnje iskustvo u promociji i prodaji svojih proizvoda ali mi je Croland.hr nakon velikog broja domaćih pomogao u pronalasku kupaca i u Švicarskoj.”</p>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="team-member">
            <img class="mx-auto rounded-circle" src="{{ asset('uploads/izjava2.jpg') }}" alt="">
            <h4>Davor Zec</h4>
            <p class="text-muted">EMEDIA j.d.o.o.</p>
            <p class="text-muted">„Vrlo sam zadovoljan sa stranicom, omogućava mi ne samo jednostavno oglašavanje vlastitih proizvoda, već i kupnju drugih domaćih proizvoda.”</p>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="team-member">
            <img class="mx-auto rounded-circle" src="{{ asset('uploads/izjava3.jpg') }}" alt="">
            <h4>Tomislav Ciković</h4>
            <p class="text-muted">SPORTOS j.d.o.o.</p>
            <p class="text-muted">„Nisam se ranije oglašavao na internetu, no ekipa sa Croland.hr mi je olakšala cjelokupno iskustvo i i sada mogu bez problema prodavati svoje proizvode. Hvala.”</p>
          </div>
        </div>
      </div>
      <div class="row" style="margin-top: 50px;">
        <img src="{{ asset('uploads/logo-gasic.png') }}" class="col-lg-3">
        <img src="{{ asset('uploads/ferbezar-logo.png') }}" class="col-lg-3">
        <img src="{{ asset('uploads/testamen-vinarija.jpg') }}" class="col-lg-3">
        <img src="{{ asset('uploads/bboil-logo.png') }}" class="col-lg-3" style="height: 100%; margin-top: 55px;">
        <img src="{{ asset('uploads/ljutoteka_logo_trans_big.png') }}" class="col-lg-3" style="height: 100%; margin-top: 95px;">
        <img src="{{ asset('uploads/organica-vita-logo-1559895152.jpg.png') }}" class="col-lg-3" style="height: 100%; margin-top: 55px;">
        <img src="{{ asset('uploads/perkovic-logo.png') }}" class="col-lg-3" style="height: 100%; margin-top: 55px;">
        <img src="{{ asset('uploads/logo-organic.jpg') }}" class="col-lg-3" style="height: 100%; margin-top: 88px;">
      </div>
    </div>
  </section>


@endsection