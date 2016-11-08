@extends('layouts.master')
@section('content')
<div class="col-xs-12">
    <h1>Edytuj użytkownika</h1>
    {{--</hr>--}}
    {{Form::model($raz,['method'=>'PATCH','action'=>['UsersController@update',$raz->id],'files'=>'true'])}}
{{--        {{   Form::open($raz, array('route' => array('users.update', $raz->id))) }}--}}
{{--       {{ Form::open(['url'=>'users/update',$raz->id]) }}--}}

    <div class="form-group">
        {!! Form::label('email','E-mail') !!}
        {!! Form::text('email',null, array('required','class' => 'form-control','placeholder'=>'Twój adres E-mail!')) !!}
    </div>
    @if(Auth::user()->id==$raz->id)
    <div class="form-group">
        <label for="userfile">Image File</label>
        <input type="file" class="form-control" name="userfile">
    </div>
       
    @endif
    @if(Auth::user()->can('can_edit_user'))
    <div class="form-group">
        {!! Form::label('role_id','Rola:') !!}
        {!! Form::select('role_id',$role,null,['class'=>'form-control']) !!}
        {{--{{$raz->roles()->attach($role_id)}}--}}
{{--        {{dd($role)}}--}}
    </div>
        @endif
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">Hasło</label>

        <div class="col-md-6">
            <input type="password" class="form-control" name="password">

            @if ($errors->has('password'))
                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">Potwierdź hasło</label>
        <div class="col-md-6">
            <input type="password" class="form-control" name="password_confirmation">

            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
            @endif
        </div>
    </div>
    <div class="form-group">
        {!! Form::submit('Zapisz',['class'=>'btn btn-primary col-xs-12 col-md-6']) !!}
        {!! Form::close() !!}
    </div>

    @include('errors.list')
</div>
@stop
