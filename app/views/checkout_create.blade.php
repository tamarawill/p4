@extends('_master')

@section('title')
Check out an item
@stop

@section('content')

    <h1>Check Out an Item:</h1>

    @foreach($errors->all() as $message)
        <div class='error'>{{ $message }}</div>
    @endforeach


    {{ Form::open(array('action' => 'CheckoutController@store')) }}

     <div class='form-group'>
        {{ Form::label('item_id','Item') }}
        {{ Form::select('item_id', $items) }}
     </div>

    <div class='form-group'>
     	{{ Form::label('end_time', 'I will return the item at:') }}
        {{ Form::text('end_time', 'YYYY-MM-DD HH:MM:SS') }}
    </div>

    <br>

    {{ Form::hidden('userid', $userid) }}

    {{ Form::submit('Check It Out!') }}
    {{ Form::close() }}
@stop
