@extends('layouts.master')

@section('content')

<div class="col-sm-12 col-md-8 col-md-offset-2 sign-panel">
    <p id="sign-heading" class="text-xs-center">Resetuj hasło</p>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
        {!! csrf_field() !!}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label class="control-label">Wpisz swój e-mail</label>

            <input type="email" class="form-control" name="email" value="{{ old('email') }}">

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary col-xs-12">
            Zresetuj
        </button>
            
        </div>
    </form>
        
</div>
@endsection
