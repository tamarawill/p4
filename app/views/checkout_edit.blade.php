@extends('_master')

@section('title')
Edit Checkout
@stop

@section('content')

    <h1>Change Checkout End Date:</h1>

        @foreach($errors->all() as $message)
            <div class='error'>{{ $message }}</div>
        @endforeach

    {{ Form::model($checkout, ['method' => 'put', 'action' => ['CheckoutController@update', $checkout->id]]) }}

    <div class='form-group'>
     	{{ Form::label('end_time', 'I will return the item at:') }}
        {{ Form::text('end_time') }}
    </div>

    <br>

    {{ Form::submit('Change End Date') }}
    {{ Form::close() }}

    {{ Form::open(['method' => 'DELETE', 'action' => ['CheckoutController@destroy', $checkout->id]]) }}

        {{ Form::submit('Check Item In') }}

    {{ Form::close() }}


@stop
