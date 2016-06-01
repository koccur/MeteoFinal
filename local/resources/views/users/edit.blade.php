@extends('layouts.master')
@section('content')
<div class="col-xs-12">
    <h1>Edytuj użytkownika</h1>
    {{--</hr>--}}
    {{Form::model($raz,['method'=>'PATCH','route'=>['users.update',$raz->id],'files'=>'true'])}}
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
    @if(Auth::user()->can('edit_user'))
    <div class="form-group">
        {!! Form::label('role_id','Rola:') !!}
        {!! Form::select('role_id',$role,null,['class'=>'form-control']) !!}
{{--        {{$raz->sync($role)}}--}}
{{--        {{$raz->attachRole($role)}}--}}

        {{--{{dd($role)}}--}}
    </div>
        @endif
    <div class="form-group">
        <button type="button" class="btn btn-primary col-xs-12 col-md-6">{!! Form::submit() !!}</button>
        
    </div>

    @include('errors.list')
</div>
@stop