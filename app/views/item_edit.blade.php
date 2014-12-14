@extends('_master')

@section('title')
    Edit Item
@stop

@section('content')

    @foreach($errors->all() as $message)
        <div class='error'>{{ $message }}</div>
    @endforeach

    {{ Form::model($item, ['method' => 'put', 'action' => ['ItemController@update', $item->id]]) }}

     <h2>Update: {{ $item->description }}</h2>

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

    {{ Form::submit('Update') }}

    {{ Form::close() }}


    {{ Form::open(['method' => 'DELETE', 'action' => ['ItemController@destroy', $item->id]]) }}

        {{ Form::submit('Delete') }}

    {{ Form::close() }}

@stop