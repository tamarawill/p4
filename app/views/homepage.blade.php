@extends('_master')

@section('title')
    Home
@stop

@section('content')

	<h1>Welcome to the SharedStuff Application!</h1>

    @if( Auth::check())

        <p>You are logged in! Welcome!</p>

    @else

        <p>To view the awesome stuff herein, you must <a href="/login">log in</a>.</p>

    @endif

@stop