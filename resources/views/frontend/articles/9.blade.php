@extends('frontend.includes.frontend_core')

@section('content')
<header class="masthead" data-toggle="modal" data-target=".bs-example-modal-lg" style="background-image: url({{ asset('uploads/Saran_u_rasljama_2__tz_bilje.jpg') }});">
    <div class="texture-handler top"><div class="texture top-texture"></div></div>
        <div class="container h-720">
        <div class="intro-text">

        </div>
        </div>
        <div class="texture-handler bottom"><div class="texture bottom-texture"></div></div>
    </header>
<section class="page-section" id="o-nama">
        <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
            <div class="sub-opis ">
<h1 style="margin-top: 20px;">PRISJEĆAMO SE STARIH I IZVORNIH JELA
</h1>
<p>Tradicionalno jelo „Šaran u rašljama“ (mađ. Csiptetős ponty) i manje poznato jelo „Štuka u mundiru” (mađ. Mundéros csuka) izvorno potječu iz sela Kopačevo, naselja unutar općine Bilje. Kako su se u tom starom ribarskom selu, nekoć, mještani bavili ribolovom, nastala su tradicionalna jela od ribe koja su bila jednostavna za pripremiti. S obzirom da je ribarima bilo važno da mogu svoj obrok uz obalu pripremiti što lakše i jednostavnije, nastao je „Šaran u rašljama” za što je potrebna bila obrađena grana u obliku rašlje, riba, sol, začinska paprika i vatra. Jednako tako je za „Štuku u mundiru” bila potrebna nešto drugačije obrađena grana, sol, začinska paprika, crveni luk i vatra. Danas se gotovo u svakom ugostiteljskom objektu može pronaći Šaran u rašljama, a Štuka u mundiru nešto rjeđe. 


</p>

<p>VIŠE INFORMACIJA NA: <a href="http://tzo-bilje.hr/
">http://tzo-bilje.hr/
</a></p>
</div>
    </div>
        </div>
            </div>
    </section>
<div class="row" id="332">
    
            <img src="{{ asset('uploads/clhr_1.jpg') }}" class="col-lg-3 p-lr-0">
            <img src="{{ asset('uploads/clhr_2.jpg') }}" class="col-lg-3 p-lr-0">
            <img src="{{ asset('uploads/clhr_3.jpg') }}" class="col-lg-3 p-lr-0">
            <img src="{{ asset('uploads/clhr_4.jpg') }}" class="col-lg-3 p-lr-0">
    </div>

@endsection