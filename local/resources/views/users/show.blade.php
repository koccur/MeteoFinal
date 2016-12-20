@extends('layouts.master')

@section('content')
@if(!Auth::guest())
<div class="user-profile">
    <div id="avatar" class="col-xs-1">
           <img  src="{{URL::asset($user->image_url)}}" alt="" />
    </div>
    <div class="col-sm-12 col-md-11">
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
           <li> <a href="{{action('UsersController@edit',$user->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edytuj użytkownika</a></li>
           <li> <a href="{{action('UsersController@destroy',$user->id)}}"><i class="fa fa-user-times" aria-hidden="true"></i> Usuń użytkownika</a></li>
        </ul>
        @endif
    </div>
    <div class="clearfix"></div>
    <div class="recent-comment">

        {!! Form::close() !!}
 </div>
@endif
@stop
