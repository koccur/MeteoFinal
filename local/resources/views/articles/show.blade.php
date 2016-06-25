@extends('layouts.master')

@section('content')
    <div class="article-show">
    <div id="ob" style="background-image:url('{{URL::asset($article->image_url)}}'); background-repeat: no-repeat;background-position: center; height: 500px;background-size:100%;"></div>
{{--    <img class="img-fluid" src="{{URL::asset($article->image_url)}}" alt="" />--}}
    {{--<img id="head-img" class="img-fluid" src="http://img.cda.pl/obr/oryginalne/850ca7d90566b9ed82c60d9d50771230.jpg" alt="" />--}}
    <div id="article-content-box" style="padding-top:20px;">
            <h1>{{ $article->title }}</h1>
            <div id="cat-name">Kategoria: {{$article->cat_name}}</div>
            <div id="published"><i class="fa fa-clock-o"></i> {{$article->published_at}}</div>

        <article>
            {{$article->body}}
        </article>
        <div id="author">
        Autor: {{$article->author}}
        </div>
    </div>
    {{--<div class="comments">--}}
    {{--<h3>Dodaj komentarz:</h3>--}}
        {{--<div class="row">--}}
            {{--<div class="col-xs-12 col-md-6">--}}
                {{--<div class="add-comment">--}}
                    {{--<form>--}}
                        {{--<fieldset class="form-group">--}}
                            {{--<label for="exampleInputEmail1">Adres e-mail</label>--}}
                            {{--<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Wpisz e-mail">--}}
                        {{--</fieldset>--}}
                        {{--<fieldset class="form-group">--}}
                            {{--<label for="exampleInputNick">Twój nick</label>--}}
                            {{--<input type="text" class="form-control" id="exampleInputNick" placeholder="Wpisz swój nick">--}}
                        {{--</fieldset>--}}
                        {{--<fieldset class="form-group">--}}
                            {{--<label for="exampleTextarea">Wpisz komentarz</label>--}}
                            {{--<textarea class="form-control" id="exampleTextarea" rows="5"></textarea>--}}
                            {{--<button type="submit" class="btn btn-success">Dodaj komentarz</button>--}}
                      {{--</fieldset>--}}
                    {{--</form>--}}
                    
                {{--</div>--}}
            {{--</div>--}}
        {{--<header>--}}
            {{--<h3>Komentarze:</h3>--}}
        {{--</header>--}}
        {{--<article class="row">--}}
            {{--<div class="col-xs-3 col-sm-2">--}}
                {{--<figure>--}}
                    {{--<img src="http://www.keita-gaming.com/assets/profile/default-avatar-c5d8ec086224cb6fc4e395f4ba3018c2.jpg" class="figure-img img-fluid img-rounded" alt="">--}}
                {{--</figure>--}}
            {{--</div>--}}

            {{--<div class="col-xs-8 col-sm-9">--}}
                {{--<div class="panel-body">--}}
                    {{--<header>--}}
                        {{--<div class="comment-user">--}}
                            {{--<i class="fa fa-user"></i> Nazwa uzytkownika--}}
                        {{--</div>--}}
                        {{--<time class="comment-date" datetime="16-12-2014 01:05">--}}
                            {{--<i class="fa fa-clock-o"></i> Dec 16, 2014--}}
                        {{--</time>--}}
                    {{--</header>--}}

                    {{--<div class="comment-post">--}}
                      {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</article>--}}
    </div>
        <div class="row">
            
        </div>
    <div>
        <a href="{{action('CommentsController@store')}}">Komentuj!</a>
        @if($comments)
            <ul style="list-style: none; padding: 0">
                @foreach($comments as $comment)
                    <li class="panel-body">
                        <div class="list-group">
                            <div class="list-group-item">
                                <h3>{{ $comment->author->name }}</h3>
                                <p>{{ $comment->created_at->format('M d,Y \a\t h:i a') }}</p>
                            </div>
                            <div class="list-group-item">
                                <p>{{ $comment->body }}</p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>


@stop