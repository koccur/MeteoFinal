<!-- Zastanowic sie nad rozmiarem i wyswietlaniem nagłówka artykułu -->
@extends('layouts.master')
@section('content')
<div class="col-xs-12 articles">
    <h1 id="article-page-header">Artykuły</h1>
    @if(Auth::user()->can('can_create'))
    <a href="{{action('ArticlesController@create')}}">Stwórz nowy</a>
    @endif
        {{$articles=App\Article::latest('published_at')->published()->paginate(5)}}
    @foreach($articles as $article)
        <div class="row">
            <div class="col-xs-1 pull-right">
            @if(!Auth::guest())
            @if(Auth::user()->can('can_edit'))
                <a href="{{action('ArticlesController@edit',$article->id)}}">Edytuj <i class="fa fa-arrow-down" aria-hidden="true"></i></a>
            @endif
            @endif
            </div>
        </div>
        <article>
            <a href="{{action('ArticlesController@show',$article->id)}}">
            <div id="image-article">
            <img class="img-fluid" src="{{URL::asset($article->image_url_s)}}" alt="" />
            {{--<img class="img-fluid" src="http://img.cda.pl/obr/oryginalne/850ca7d90566b9ed82c60d9d50771230.jpg" alt="" />--}}
            </div>
            <div id="content-article">
            <div class="body">
                    <h5>{{$article->title}}</h5>
                    {{$article->published_at}}
                    <p>{{\Illuminate\Support\Str::limit(strip_tags($article->body),200)}}</p>
            </div>
            
            </div>
            </a>
        </article>
    @endforeach
</div>
@stop