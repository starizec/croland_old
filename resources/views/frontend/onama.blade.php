@extends('frontend.includes.frontend_core')

@section('content')
<section class="page-section" id="o-nama">
        <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
            <div class="sub-opis ">
<h1 style="margin-top: 20px;">TURISTIČKO INFORMATIVNI PORTAL</h1>
<p>Specijalizirani portal kontinentale Hrvatske.
Zbog nedovoljno iskorištenog potencijala i želje u promicanju hrvatskog kontinentalnog
turizma odlučili smo pokrenuti CroLand.hr, jedinstveni portal isključivo specijaliziran za
kontinentalni turizam.</p>
<p>Čvrstog smo uvjerenja da Hrvatska unutrašnjost prepuna prirodnih ljepota, zanimljivih
manifestacija, povijesnih građevina, sela i gradova može ponuditi puno toga i u potpunosti
konkurirati Hrvatskoj obali.</p>
<h2>MISIJA CroLand</h2>
<p>Glavna misija ovog turističko-informativnog portala je ujediniti sve potencijalne oglašivače
svih hrvatskih županija koji dolaze sa područja kontinentalne hrvatske i približiti njihov
sadržaj domaćim i stranim turistima kako bi iskusili do sada relativno neotkrivenu ljepotu i
sadržaj koji im se može ponuditi.</p>
<h2>ŠTO CroLand NUDI?</h2>
<p>U ostvarenju ovog cilja koristimo najsuvremeniju tehnologiju za kreiranje jedinstvenog
sadržaja kojeg promoviramo na CroLand.hr i najposjećenijim svjetskim društvenim
mrežama.</p>
<p>Ono što nas izdvaja od ostalih oglašivačkih stranica je:
    <ul>
<li>korištenje dron bespilotne letjelice za snimanje video i foto sadržaja iz zraka,</li>
<li>kreiranje 360° virtualne šetnje,</li>
<li>fotografiranje i obrada turističke ponude,</li>
<li>detaljan opis turističke ponude na više jezika,</li>
<li>promocija na najpopularnijim svjetskim društvenim mrežama,</li>
<li>obuhvaćenost svih hrvatskih kontinentalnih regija i njihovih ljepote na jednome
mjestu</li>
</ul></p>

<h2>PROMOCIJA I ULAGANJE U SLAVONIJU I BARANJU!</h2>

<p>
Portal CroLand želi pokrenuti Slavoniju i Baranju. Pruža mogućnost promoviranja grada ili općine.<br>
Croland nudi posebnu uslugu u kojoj općine i gradovi imaju mogućnost izlaganja svojih ideja,
odnosno izlaganje poticajnih mjera koje nude ne samo investitorima nego i mladim obiteljima kako
bi ih privukli u svoj kraj.<br>
Također, portal turistički promovira gradove i općine oglašavanjem i kreiranjem novog foto i video
sadržaja kojim planira povećati i unaprijediti dolazak domaćih i stranih turista u što većem broju.<br>
</p>

</div>
    </div>
        </div>
            </div>
    </section>

    <section class="page-section" id="contact">
  <div class="texture-handler top-mail"><div class="texture top-texture-mail"></div></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          
        </div>
      </div>
      <div class="row">
        <div class="container">
          <form id="contactForm" name="sentMessage" novalidate="novalidate">
            <div class="row">
              <div class="col-md-6">
                <div class="kontakt-ljudi">
                <h2 class="section-heading text-uppercase">Prima:</h2>
                  <div class="">CroLand.hr</div>
                  <div class="">Gavo Obrt</div>
                  <div class="">Naselje Viševica 11</div>
                  <div class="">31000 Osijek</div>
                  <div class="">OIB: 06110377938</div>
                  <div class="">091/529-1809</div>
                  <div class="">info@croland.hr</div>
                </div>
              </div>
              <div class="col-md-6">
              <div class="form-group">
                  <input class="form-control" id="name" type="text" placeholder="Ime *" required="required" data-validation-required-message="Please enter your name." style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <input class="form-control" id="email" type="email" placeholder="Email *" required="required" data-validation-required-message="Please enter your email address.">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <input class="form-control" id="phone" type="tel" placeholder="Broj telefona" required="required" data-validation-required-message="Please enter your phone number.">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <textarea class="form-control" id="message" placeholder="Upit *" required="required" data-validation-required-message="Please enter a message."></textarea>
                  <p class="help-block text-danger"></p>
                  <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Pošalji</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>


@endsection