@extends('layouts.master')

@section('content')

<div class="col-sm-12 col-md-8 col-md-offset-2 sign-panel">
        <p id="sign-heading" class="text-xs-center">Zarejestruj się</p>
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                {!! csrf_field() !!}

                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    <label class="control-label">Nazwa użytkownika</label>

                    <input type="text" class="form-control" name="username" value="{{ old('username') }}">

                    @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label class="control-label">E-Mail</label>

                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label class=" control-label">Hasło</label>
                        <input type="password" class="form-control" name="password">

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                </div>

                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <label class="control-label">Powtórz hasło</label>
                        <input type="password" class="form-control" name="password_confirmation">

                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                </div>

                <button type="submit" name="rejestruj" class="btn btn-primary col-xs-12">
                    Załóż konto
                </button>
                
    </form>
</div>

@endsection
