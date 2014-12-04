@extends('_master')

@section('title')
    Category List
@stop

@section('content')

<h1>Categories:</h1>

@foreach($categories as $category)
<div>
{{ $category->name }}<br>
</div>
@endforeach

@stop

