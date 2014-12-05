@extends('_master')

@section('title')
    Item List
@stop

@section('content')

<h1>Item List</h1>

@foreach($items as $item)
    <div>
        <a href="/item/{{ $item->id }}">{{ $item->description }}</a>
    </div>
@endforeach
<h1>Create a New Item</h1>
<div><a href="/item/create">Create New Item</a></div>

@stop

