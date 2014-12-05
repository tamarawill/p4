@extends('_master')

@section('title')
Create a new item
@stop

@section('content')

    <h1>Create an Item</h1>

    {{ Form::open(array('action' => 'ItemController@store')) }}

     <div class='form-group'>
        {{ Form::label('description','Description') }}
        {{ Form::text('description') }}
     </div>

    <div class='form-group'>
     	{{ Form::label('category_id', 'Category') }}
        {{ Form::select('category_id', $categories); }}
    </div>

     <div class='form-group'>
        {{ Form::label('make','Make') }}
        {{ Form::text('make') }}
     </div>

     <div class='form-group'>
        {{ Form::label('model','Model') }}
        {{ Form::text('model') }}
     </div>

     <div class='form-group'>
        {{ Form::label('serial','Serial Number') }}
        {{ Form::text('serial') }}
     </div>

     <div class='form-group'>
        {{ Form::label('notes','Notes') }}
        {{ Form::textarea('notes') }}
     </div>

    <br><br>

    {{ Form::submit('Add Item') }}
    {{ Form::close() }}
@stop
