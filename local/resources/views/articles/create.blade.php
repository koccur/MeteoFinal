@extends('layouts.master')
@section('content')
	<div class="col-xs-12">
    <h1>Dodaj nowy artykuł</h1>
    </hr>

    {!! Form::open(['url' => 'articles','files'=>'true']) !!}

    @include('articles._form',['submitButtonText' => 'Utwórz'])

    {!! Form::close() !!}


    @include('errors.list')
    </div>
@stop