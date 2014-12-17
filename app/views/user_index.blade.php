@extends('_master')

@section('title')
    All Users
@stop

@section('content')

<h1>All Users</h1>

<p><a href="/user/create" class="btn btn-primary">Create New User</a></p>

<table class="table table-striped">
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

@stop

