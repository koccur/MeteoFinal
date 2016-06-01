@extends('layouts.master')
@section('content')
<div class="col-xs-12">
    <h1>Edycja artykułu: {!! $article->title !!}</h1>

    {!! Form::model($article,['method' => 'PATCH', 'action' => ['ArticlesController@update',$article->id]]) !!}
    @include('articles._form',['submitButtonText' => 'Zaktualizuj'])

    {!! Form::close() !!}

    @include('errors.list')
</div>
@stop