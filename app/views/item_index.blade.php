@extends('_master')

@section('title')
    Item List
@stop

@section('content')

<h1>Item List</h1>

<p><a href="/item/create" class="btn btn-primary">Create New Item</a></p>

@foreach($items as $item)
    <div>
            <a href="/item/{{ $item->id }}">{{ $item->description }}</a>
    </div>
@endforeach

@stop

