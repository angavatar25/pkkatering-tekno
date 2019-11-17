<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
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
        <div class="login-container">
            <h1 class="title">
                PKKatering
            </h1>
            <form class="input-container">
                <input type="text" placeholder="Username">
                <input type="password" placeholder="Password">
                <button>
                    <a href="#">Log In</a> 
                </button>
                <span class="daftar-disini">Belum punya akun? <a href="{{ url('signup') }}">Daftar Disini</a></span>
            </form>
        </div>
    </body>
</html>
