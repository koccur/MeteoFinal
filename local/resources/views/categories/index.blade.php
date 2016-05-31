@extends('layouts.master')

@section('content')

    <h1>Kategorie</h1>
    </hr>
    <a href="{{action('CategoriesController@create')}}">Stwórz nowy</a>
    @foreach($categories as $category)
        <article>
            <h2>
                <a href="{{action('CategoriesController@show',$category->id)}}">
                {{$category->title}}</a>
            </h2>
            <div class="body">{{$category->description}}</div>
        </article>
    @endforeach
    <hr class="divider">
@stop