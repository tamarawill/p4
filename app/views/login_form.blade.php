@extends('_master')

@section('title')
    Log In
@stop

@section('content')

	<h1>Log In</h1>

    {{ Form::open(array('action' => 'UserController@postLogin')) }}

     <div class='form-group'>
        {{ Form::label('email','Email') }}
        {{ Form::text('email') }}
     </div>

    <div class='form-group'>
     	{{ Form::label('password', 'Password') }}
        {{ Form::password('password') }}
    </div>

    <br>

    {{ Form::submit('Log In') }}
    {{ Form::close() }}


@stop