@extends('layouts.master')
@section('content')
    <h1>Napisz nową kategorie</h1>
    </hr>

    {!! Form::open(['url' => 'categories']) !!}
    @include('categories._form',['submitButtonText' => 'Utwórz'])

    {!! Form::close() !!}


    @include('errors.list')
@stop