@extends('layouts.master')
@section('content')
    <h1>Edit: {!! $category->title !!}</h1>

    {!! Form::model($category,['method' => 'PATCH', 'action' => ['CategoriesController@update',$category->id]]) !!}
    @include('categories._form',['submitButtonText' => 'Zaktualizuj'])

    {!! Form::close() !!}

    @include('errors.list')
    @stop