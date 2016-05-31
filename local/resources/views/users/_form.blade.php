@extends('layouts.master')
@section('content')
<div class="form-group">
    {!!Form::label('username','Nazwa użytkownika')!!}
    {!!Form::text('username', null, array('required','class' => 'form-control','placeholder'=>'Twoja nazwa użytkownika'))!!}
</div>

<div class="form-group">
    {!! Form::label('email','E-mail') !!}
    {!! Form::text('email',null, array('required','class' => 'form-control','placeholder'=>'Twój adres E-mail!')) !!}
</div>
<div class="form-group">
    {!! Form::label('password','Haslo:') !!}
    {!! Form::text('password',null,array('required','class' => 'form-control','placeholder'=>'Twoje hasło!')) !!}
</div>
<div class="form-group">
    {!! Form::label('password_confirmation','Potwierdź hasło') !!}
    {!! Form::text('password_confirmation',null,array('required','class' => 'form-control','placeholder'=>'Potwierdz swoje haslo')) !!}
</div>
<div class="form-group">

    {{--{!! Form::submit($submitButtonText,--}}
     {{--['class'=>'btn btn-primary form-control'],--}}
     {{--array('route'=>'/'))}} !!}--}}

</div>
@stop