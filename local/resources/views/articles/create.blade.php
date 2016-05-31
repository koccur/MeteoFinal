@extends('layouts.master')
@section('content')
    <h1>Napisz nowy artykuł</h1>
    </hr>

    {!! Form::open(['url' => 'articles','files'=>'true']) !!}

    @include('articles._form',['submitButtonText' => 'Utwórz'])

    {!! Form::close() !!}


    @include('errors.list')
@stop