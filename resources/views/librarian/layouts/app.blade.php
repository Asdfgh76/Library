<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Панель библиотекаря: @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
              <a class="navbar-brand" href="{{ route('home') }}">Библиотека</a>
              <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                <ul class="navbar-nav">
                    @auth
                    @admin
                    <li>
                        <a class="nav-link" href="{{ route('admin.user.index') }}">Админпанель</a>
                    </li>
                    @endadmin
                    @lib
                    <li>
                        <a class="nav-link" href="{{ route('librarian.book.index') }}">Панель библиотекаря</a>
                    </li>
                    @endlib
                    @endauth
                </ul>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
                @guest
                    <li class="nav-item"><a class="nav-link active" href="{{ route('login') }}">Войти</a></li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                        </li>
                    @endif
                @endguest
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        @admin Администратор @else {{ Auth::user()->name }} @endadmin
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}" role="button">Выйти</a>
                        </li>
                    </ul>
                </li>
                @endauth
            </ul>
            </div>
        </div>
        </nav>
        <div class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>
</html>
