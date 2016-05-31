@extends('layouts.master')

@section('content')
    <h1>{{ $category->title }}</h1>
    <article>
        {{$category->description}}
    </article>
    <br>
    <a href="{{action('CategoriesController@edit',[$category->id])}}">Edytuj</a>
@stop