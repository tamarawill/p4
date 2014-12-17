@extends('_master')

@section('title')
    View Category
@stop

@section('content')

	<h1>Category: {{ $category->name }}</h1>

		@if( Auth::user()->is_admin )
	        <p><a href="/category/{{ $category->id }}/edit" class="btn btn-primary">Edit Category</a></p>
    	@endif

@stop