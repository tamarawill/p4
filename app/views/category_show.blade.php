@extends('_master')

@section('title')
    View Category
@stop

@section('content')

	<h1>Category: {{ $category->name }}</h1>
	<a href="/category/{{ $category->id }}/edit">Edit</a>

@stop