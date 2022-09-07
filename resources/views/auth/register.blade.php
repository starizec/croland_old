@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registracija</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('ime') ? ' has-error' : '' }}">
                            <label for="ime" class="col-md-4 control-label">Ime</label>

                            <div class="col-md-6">
                                <input id="ime" type="text" class="form-control" name="ime" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('ime'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ime') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('prezime') ? ' has-error' : '' }}">
                            <label for="prezime" class="col-md-4 control-label">Prezime</label>

                            <div class="col-md-6">
                                <input id="prezime" type="text" class="form-control" name="prezime" value="{{ old('prezime') }}" required autofocus>

                                @if ($errors->has('prezime'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('prezime') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('adresa') ? ' has-error' : '' }}">
                            <label for="adresa" class="col-md-4 control-label">Adresa</label>

                            <div class="col-md-6">
                                <input id="adresa" type="text" class="form-control" name="adresa" value="{{ old('adresa') }}" required autofocus>

                                @if ($errors->has('adresa'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('adresa') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('postanski_broj') ? ' has-error' : '' }}">
                            <label for="postanski_broj" class="col-md-4 control-label">Poštanski broj</label>

                            <div class="col-md-6">
                                <input id="postanski_broj" type="text" class="form-control" name="postanski_broj" value="{{ old('postanski_broj') }}" required autofocus>

                                @if ($errors->has('postanski_broj'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('postanski_broj') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('mjesto') ? ' has-error' : '' }}">
                            <label for="mjesto" class="col-md-4 control-label">Mjesto</label>

                            <div class="col-md-6">
                                <input id="mjesto" type="text" class="form-control" name="mjesto" value="{{ old('mjesto') }}" required autofocus>

                                @if ($errors->has('mjesto'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mjesto') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Lozinka</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Potvrda lozinke</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Registracija
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
