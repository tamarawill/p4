<!DOCTYPE html>
<html>

<head>

    <title>@yield('title','SharedStuffTracker')</title>
    <meta charset='utf-8'>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

    <!-- Date-time picker css -->
    <link rel="stylesheet" href="/css/bootstrap-datetimepicker.min.css" type="text/css">

    <link rel="stylesheet" href="/css/styles.css" type="text/css">

    @yield('head')

</head>

<body>

    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container-fluid">

        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#ssnavbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">SharedStuff</a>
        </div>

          <div class="collapse navbar-collapse" id="ssnavbar">
            <ul class="nav navbar-nav">

              @if( Auth::check())

                  <li><a href="/">Home</a></li>
                  <li><a href="/checkout">Checkouts</a></li>
                  <li><a href="/item">Items</a></li>
                  <li><a href="/category">Categories</a></li>
                  @if ( Auth::user()->is_admin )
                  <li><a href="/user">Users</a></li>
                  @endif
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                    role="button" aria-expanded="false"><span class="glyphicon glyphicon-cog"></span>
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a>{{ Auth::user()->email }}
                        @if ( Auth::user()->is_admin )
                        <span class="glyphicon glyphicon-wrench"></span>
                        @endif
                        </a></li>
                        <li><a href="/logout">Log Out</a></li>
                    </ul>
                  </li>

              @else

                  <li><a href="/">Home</a></li>
                  <li><a href="/login">Log In</a></li>
                  <li><a href="/signup">Sign Up</a></li>

              @endif

            </ul>

        </div><!-- end navbar-collapse -->
      </div><!--end container-fluid -->
    </nav>

	@if(Session::get('flash_message'))
	      <div class="container-fluid">
	        <div class="row">
	            <div class="col-md-12">
                    <p class="alert alert-danger" role="alert">{{ Session::get('flash_message') }}</p>
                </div>
            </div>
        </div>
    @endif

      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">


    @yield('content')

            </div>
        </div>
    </div>


    <!-- JQuery Javascript -->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

    <!-- Moment.js Javascript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>

    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    @yield('scripts')

</body>