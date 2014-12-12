@extends('_master')

@section('title')
    Edit User
@stop

@section('content')

	<h1>Edit User</h1>

	@foreach($errors->all() as $message)
        <div class='error'>{{ $message }}</div>
    @endforeach

    {{ Form::model($user, ['method' => 'put', 'action' => ['UserController@update', $user->id]]) }}

     <div class='form-group'>
        {{ Form::label('email','Email') }}
        {{ Form::text('email') }}
     </div>

     <div class='form-group'>
        {{ Form::label('first_name','First Name') }}
        {{ Form::text('first_name') }}
     </div>

     <div class='form-group'>
        {{ Form::label('last_name','Last Name') }}
        {{ Form::text('last_name') }}
     </div>

     <div class='form-group'>
        {{ Form::label('is_admin','Admin') }}
        {{ Form::select('is_admin', array(0 => 'No', 1 => 'Yes')) }}
     </div>

    <br>

    {{ Form::submit('Edit User') }}
    {{ Form::close() }}

    {{ Form::open(['method' => 'DELETE', 'action' => ['UserController@destroy', $user->id]]) }}

        {{ Form::submit('Delete User') }}

    {{ Form::close() }}


@stop