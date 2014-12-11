@extends('_master')

@section('title')
    Create an Account
@stop

@section('content')

	<h1>Create an Account</h1>

	@foreach($errors->all() as $message)
        <div class='error'>{{ $message }}</div>
    @endforeach

    {{ Form::open(array('action' => 'UserController@postSignup')) }}

     <div class='form-group'>
        {{ Form::label('email','Email') }}
        {{ Form::text('email') }}
     </div>

    <div class='form-group'>
     	{{ Form::label('password', 'Password') }}
        {{ Form::password('password') }}
    </div>

    <div class='form-group'>
        {{ Form::label('password2', 'Re-enter Password') }}
        {{ Form::password('password2') }}
    </div>

     <div class='form-group'>
        {{ Form::label('first_name','First Name') }}
        {{ Form::text('first_name') }}
     </div>

     <div class='form-group'>
        {{ Form::label('last_name','Last Name') }}
        {{ Form::text('last_name') }}
     </div>

    <br>

    {{ Form::submit('Create Account') }}
    {{ Form::close() }}

@stop