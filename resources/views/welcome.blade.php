<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-image: url("{{asset('images/library.jpg')}}");
                background-size: 100%;
                color: azure;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                /*position: absolute;*/
                right: 10px;
                top: 18px;
                opacity: 0.8;
                background-color:brown;
                text-align: center;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links>strong>a {
                color: azure;
                padding: 0 25px;
                font-size: 23px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .links>strong>a:hover {
                font-size: 28px;
            }

            .m-b-md {
                margin-bottom: 30px;
            }


            .links>p{
                padding: 5px;
                margin-right: 40px;
                font-size: 23px;
                font-weight: 600;
                margin-left: 20px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">

                    @auth
                    @if(Auth::user()->isLibrarian())
                        <strong> <a href="{{ url('/librarian') }}" style='color:azure; text-decoration:none'>Панель библиотекаря</a></strong>
                    @elseif(Auth::user()->isUser())
                        <strong> <a href="{{ url('/user') }}" style='color:azure; text-decoration:none'>Кабинет</a></strong>
                        <strong> <a href="{{ url('/') }}" style='color:azure; text-decoration:none'>Главная</a></strong>
                    @elseif(Auth::user()->isAdministrator())
                        <strong> <a href="{{ url('/admin/users') }}" style='color:azure; text-decoration:none; cursor:pointer'>Панель Администратора</a></strong>
                        <strong> <a href="{{ url('/') }}" style='color:azure; text-decoration:none'>Главная</a></strong>
                    @endif
                        <strong>
                        <a class="dropdown-item" href="{{ route('logout') }}" style='color:azure; text-decoration:none' onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Выйти</a></strong>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                    @else
                    <p>Добро пожаловать в библиотеку!<br>
                    Чтобы воспользоваться нашей библиотекой</p>
                        <strong>
                        <a href="{{ route('login') }}" style="color: azure; text-decoration:none">Войдите</a>
                        </strong>
                    <p>или</p>
                        @if (Route::has('register'))
                        <strong>
                            <a href="{{ route('register') }}" style="color:azure; text-decoration:none">Зарегиструйтесь</a>
                            </strong>
                        @endif
                    @endauth
                </div>
            @endif



        </div>
    </body>
</html>
