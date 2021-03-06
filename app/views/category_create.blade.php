@extends('_master')

@section('title')
Create a new category
@stop

@section('content')

    <h1>Create a Category</h1>

    @foreach($errors->all() as $message)
        <div class='error'>{{ $message }}</div>
    @endforeach

    {{ Form::open(array('action' => 'CategoryController@store')) }}

    <div>
        {{ Form::label('name','Category Name') }}
        {{ Form::text('name') }}
    </div>

    <br><br>

    {{ Form::submit('Add Category') }}
    {{ Form::close() }}
@stop
