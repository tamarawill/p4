<!DOCTYPE html>
<html>

<head>

    <title>@yield('title','SharedStuffTracker')</title>
    <meta charset='utf-8'>
    <link rel="stylesheet" href="styles.css" type="text/css">

    @yield('head')

</head>

<body>

	@if(Session::get('flash_message'))
        <div class='flash-message'>{{ Session::get('flash_message') }}</div>
    @endif

        @if( Auth::check())

            <p><a href="/">Home</a>
            |
            <a href="/checkout">View Checkouts</a>
            |
            <a href="/item">View Items</a>
            |
            <a href="/category">View Categories</a>
            |
            <a href="/user">View Users</a>
            |
            <a href="/logout">Log Out</a>
            |
            Logged in: {{ Auth::user()->email }}</p>

        @else

            <p><a href="/">Home</a>
            |
            <a href="/login">Log In</a>
            |
            <a href="/signup">Sign Up</a>
            </p>

        @endif


    @yield('content')

</body>