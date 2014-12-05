@extends('_master')

@section('title')
    View Item
@stop

@section('content')

	<h1>Item: {{ $item->description }}</h1>

	<ul>
	    <li>Category: {{ $item->getCategoryName() }}</li>
        <li>Make: {{ $item->make }}</li>
        <li>Model: {{ $item->model }}</li>
        <li>Serial Number: {{ $item->serial }}</li>
        <li>Notes: {{ $item->notes }}</li>
	</ul>

	<a href="/item/{{ $item->id }}/edit">Edit</a>

@stop