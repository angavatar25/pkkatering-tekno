<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        @include('layout.head')
        <title>Login</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
        </style>
    </head>
    <body>
        <div class="container flex-center">
            <div class="login-container">
                <h1 class="title">
                    PKKatering
                </h1>
                <form class="input-container">
                    <input type="text" placeholder="Username">
                    <input type="password" placeholder="Password">
                    <a class="button" href="{{ url('/home/') }}">Log In</a>
                    <span class="daftar-disini">Belum punya akun? <a href="{{ url('signup') }}"><b>Daftar Disini</b></a></span>
                </form>
            </div>
        </div>
    </body>
</html>
