<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <a class="navbar-brand" href="{{ route('reservation')}}">Reservation</a>
                    <a id="shopping-cart" class="navbar-brand" href="{{ route('cart')}}"><i class="fa fa-shopping-cart">Cart<span>
                      @if(Session::has('cart'))
                        {{ Session::get('cart')->totalQty}} vnt, kaina: {{ Session::get('cart')->totalPrice}} $
                        @else 0
                      @endif
                    </span></i></a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                      <form class="navbar-form navbar-left" role="search" method="post" action="{{route ('search')}}">
                        {{ csrf_field() }}
                        <div class="form-group">
                          <select class="form-control form-control-sm" name="menu">
                            @foreach ($menus as $menu)
                              <option value="{{$menu->id}}">{{$menu->title}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                          <select class="form-control form-control-sm" name="price">
                            <option value="0-5">0-5</option>
                            <option value="6-10">6-10</option>
                            <option value="11-15">11-15</option>
                            <option value="15-100000">>15</option>
                          </select>
                          </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                      </form>
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                  @if (Auth::user()->admin)
                                  <li><a href="{{ route('admin')}}">Admin</a></li>
                                  @endif
                                    <li>
                                      <a href="{{ route('userProfile')}}">User profile</a>
                                      <a href="{{ route('logout') }}"
                                          onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                          Logout
                                      </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
