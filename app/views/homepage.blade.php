@extends('_master')

@section('title')
    Home
@stop

@section('content')

	<h1>Welcome to the SharedStuff Application!</h1>

    @if( Auth::check())

        <p><a href="/checkout">View Checkouts</a></p>
        <p><a href="/item">View Items</a></p>
        <p><a href="/category">View Categories</a></p>
        <p><a href="/logout">Log Out</a></p>

    @else

        <p><a href="/login">Log In</a></p>

    @endif

@stop