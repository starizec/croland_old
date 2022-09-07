@extends('emails.core')

@section('content')
<div class="container proizvod">
    <div class="row">
        <div class="col-lg-6">
            <hr>
            <div>
                Proslijeđeno putem kontakt forme s CroLand.hr. Ne odgovarati direktno na ovaj email. Nego koristiti priloženi.
            </div>
            <hr>
            <p>Od: <b>{{ $name }}</b></p>
            <p>Email: <b>{{ $from_email }}</b></p>
            <p>Telefon: <b>{{ $phone }}</b></p>
            <p>Poruka: <b>{!! $poruka !!}</b></p>
            <p>Link na artikl ili na profil: <b><a href="//croland.hr/{{ $uri }}">CroLand.hr/{{ $uri }}</a></b></p>
        </div>
    <div>
</div>
@endsection