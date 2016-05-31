@extends('layouts.master')

@section('content')
<div class="col-xs-12">
    <h1>Użytkownicy</h1>
    <table class="table">
    <thead class="thead-inverse">
    <tr>
          <th>ID</th>
          <th>Nazwa</th>
          <th>E-mail</th>
        </tr>
    </thead>
    @foreach($users as $user)
    <tbody>
        <tr>
            <td>{{ $user->id }}</td>
            <td><a href={{url('/users',$user->id)}}>{{ $user->username }}</a></td>
            <td>{{ $user->email }}</td>
        </tr>
    </tbody>
    @endforeach
    </table>
</div>
@stop