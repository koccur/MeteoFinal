@extends('layouts.master')
@section('content')

<div class="col-sm-12 col-md-8 col-md-offset-2 sign-panel">
    <p id="sign-heading" class="text-xs-center">Zaloguj się</p>

    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
        {!! csrf_field() !!}
        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
            <label class="control-label">Nazwa użytkownika</label>

            <input type="username" class="form-control" name="username" value=>
            @if ($errors->has('username'))
                <span class="help-block">
                    <div style="color:red">
                    <strong>{{ $errors->first('username') }}</strong>
                </div>
                </span>

            @endif
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label class="control-label">Hasło</label>
            <input type="password" class="form-control" name="password">

            @if ($errors->has('password'))
                <span class="help-block">
                    <div style="color:red">
                    <strong>{{ $errors->first('password') }}</strong>
                        </div>
                </span>
            @endif
        </div>
        
        <button type="submit" class="btn btn-primary col-xs-12">Zaloguj się</button>
        <label>
            <input type="checkbox" name="remember" id="remember"> Zapamiętaj mnie
        </label>
        
        <p class="text-xs-center">Zapomniałeś hasło? <a id="password-reset" href="{{ url('/password/reset') }}">Zresetuj</a></p>
        <p class="text-xs-center">Nie masz jeszcze konta? <a id="password-reset" href="{{ url('/register') }}">Zarejestruj się</a> teraz!</p> 
    </form>   
</div>
@endsection
