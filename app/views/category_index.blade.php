@extends('_master')

@section('title')
    Category List
@stop

@section('content')

<h1>Category List</h1>

@foreach($categories as $category)
    <div>
        <a href="/category/{{ $category->id }}">{{ $category->name }}</a>
    </div>
@endforeach
<h1>Create a New Category</h1>
<div><a href="/category/create">Create New Category</a></div>

@stop

