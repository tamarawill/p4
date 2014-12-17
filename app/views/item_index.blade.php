@extends('_master')

@section('title')
    Item List
@stop

@section('content')

<h1>Item List</h1>

<p><a href="/item/create" class="btn btn-primary">Create New Item</a></p>

    <table class="table table-striped">
        @foreach($items as $item)
            <tr><td>
            <a href="/item/{{ $item->id }}">{{ $item->description }}</a>
            </td></tr>
        @endforeach
    </table>

@stop

