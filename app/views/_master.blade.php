<!DOCTYPE html>
<html>

<head>

    <title>@yield('title','SharedStuffTracker')</title>
    <meta charset='utf-8'>

    @yield('head')

</head>

<body>

	@if(Session::get('flash_message'))
        <div class='flash-message'>{{ Session::get('flash_message') }}</div>
    @endif

    @yield('content')

</body>