@extends('_master')

@section('title')
    Category List
@stop

@section('content')

<h1>Category List</h1>

<p><a href="/category/create" class="btn btn-primary">Create New Category</a></p>

    <table class="table table-striped">

        @foreach($categories as $category)
            <tr><td>
                <a href="/category/{{ $category->id }}">{{ $category->name }}</a>
            </td></tr>
        @endforeach
    </table>

@stop
