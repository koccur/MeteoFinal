@extends('layouts.master')

@section('content')
@if(!Auth::guest())
<div class="user-profile">
    <div id="avatar" class="col-xs-4 col-xs-offset-4 col-md-3 col-md-offset-0">
           <img class="img-fluid" src="{{URL::asset($user->image_url)}}" alt="" />
    </div>
    <div class="col-xs-12 col-md-9"> 
        <div id="user-name">{{$user->username}} </div>
        <div id="user-email">Email: {{$user->email}}</div>
        <div class="user-role">
        Ranga:
        @if($user->hasRole('Admin'))
        Admin
        @elseif($user->hasRole('Mod'))
            Moderator
        @elseif($user->hasRole('User'))
            Użytkownik
        @endif
        </div>
        <ul class="edit-user">
        @if($user->id==Auth::user()->id||Auth::user()->can('can_edit_user'))
{{--    {{Form::model($user,['method'=>'DELETE','route'=>['users.destroy',$user->id]])}}--}}
      {{--  {{Form::open(array('method'=>'DELETE','action'=>array('UsersController@destroy',$user->id)))}}--}}
{{--    {!! Form::submit( $submitButtonText,['class'=>'btn btn-primary form-control']) !!}--}}

           <li> <a href="{{action('UsersController@edit',$user->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edytuj użytkownika</a></li>
           <li> <a href="{{action('UsersController@destroy',$user->id)}}"><i class="fa fa-user-times" aria-hidden="true"></i> Usuń użytkownika</a></li>
        </ul>
        @endif
    </div>
    <div class="clearfix"></div>
    {{--<div class="recent-comment">--}}
    {{--<div class="col-xs-12">--}}
        {{--<h3> Ostatnie komentarze użytkownika:</h3>--}}
        {{--<p> <i class="fa fa-arrow-right" aria-hidden="true"></i>--}}
            {{--Lorem ipsum dolor sit amet.</p>--}}
        {{--<div id="content-comment"class="col-xs-10 col-xs-offset-1">--}}
            {{--Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse optio harum rerum, quidem sed architecto reprehenderit perspiciatis commodi laboriosam. Numquam soluta quia porro dicta sunt. Voluptates quos incidunt fugiat a unde, officia aperiam iure doloremque tempora explicabo praesentium, eos. Tenetur.--}}
        {{--</div>--}}
        {{--<div class="clearfix"></div>--}}
        {{--<p> <i class="fa fa-arrow-right" aria-hidden="true"></i>--}}
            {{--Lorem ipsum dolor sit amet.</p>--}}
        {{--<div id="content-comment"class="col-xs-10 col-xs-offset-1">--}}
            {{--Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse optio harum rerum, quidem sed architecto reprehenderit perspiciatis commodi laboriosam. Numquam soluta quia porro dicta sunt. Voluptates quos incidunt fugiat a unde, officia aperiam iure doloremque tempora explicabo praesentium, eos. Tenetur.--}}
        {{--</div>--}}
        {{--<div class="clearfix"></div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="clearfix"></div>--}}
        {{----}}

    <!-- <button class="btn btn-primary form-control">usun</button> -->
        {!! Form::close() !!}
 </div>
@endif
@stop
