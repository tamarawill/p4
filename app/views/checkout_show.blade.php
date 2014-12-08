@extends('_master')

@section('title')
    View Checkout
@stop

@section('content')

	<h1>Checkout: {{ $checkout->getItemName() }}</h1>

	<ul>
	    <li>Checked out by: {{ $checkout->getUserName() }}</li>
        <li>Checked out at: {{ $checkout->start_time }}</li>
        <li>To be returned by: {{ $checkout->end_time }}</li>
	</ul>

	<a href="/checkout/{{ $checkout->id }}/edit">Edit</a>

@stop