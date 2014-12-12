@extends('_master')

@section('title')
    View User
@stop

@section('content')

	<h1>User: {{ $user->email }}</h1>

	<ul>
	    <li>First Name: {{ $user->first_name }}</li>
        <li>Last Name: {{ $user->last_name }}</li>
        <li>Admin:
            @if ($user->is_admin )
                Yes
            @else
                No
            @endif
        </li>
	</ul>

	<a href="/user/{{ $user->id }}/edit">Edit</a>

@stop