@extends('_master')

@section('title')
    Category List
@stop

@section('content')

<h1>Category List</h1>

<p><a href="/category/create" class="btn btn-primary">Create New Category</a></p>

@foreach($categories as $category)
    <div>
        <a href="/category/{{ $category->id }}">{{ $category->name }}</a>
    </div>
@endforeach

@stop

