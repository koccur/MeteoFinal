@extends('layouts.master')
@section('content')
    <h1>Utwórz użytkownika</h1>
    </hr>

    {!! Form::open(['url' => 'users']) !!}
    @include('users._form',['submitButtonText' => 'Stwórz'])

    {!! Form::close() !!}

    @include('errors.list')
@stop