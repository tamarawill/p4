@extends('_master')

@section('title')
    All Users
@stop

@section('content')

<h1>All Users</h1>

<table class="table">
    <tr>
        <th>
            Email
        </th>
        <th>
            First Name
        </th>
        <th>
            Last Name
        </th>
        <th>
            Admin
        </th>
    </tr>

@foreach($users as $user)
    <tr>
        <td>
            <a href="/user/{{$user->id}}">{{ $user->email }}</a>
        </td>
        <td>
            {{ $user->first_name }}
        </td>
        <td>
            {{ $user->last_name }}
        </td>
        <td>
            @if ($user->is_admin )
                Yes
            @else
                No
            @endif
        </td>
    </tr>
@endforeach
</table>


<h1>Create a User</h1>
<div><a href="/user/create">Create a User</a></div>

@stop

