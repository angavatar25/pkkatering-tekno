<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout.head')
    <title>Sign Up</title>
</head>
<body>
        <div class="container flex-center">
            <div class="login-container">
                <h1 class="title">
                    Daftar
                </h1>
                <form class="input-container">
                    <input type="text" name="input-namaawal" id="nama-awal" placeholder="Nama Awal">
                    <input type="text" name="input-namaakhir" placeholder="Nama Akhir">
                    <input type="text" name="input-username" id="username" placeholder="Username">
                    <input type="password" name="input-password" id="password" placeholder="Password">
                    <input type="text" name="input-email" id="email" placeholder="Email">
                    <button>
                        <a href="#">Daftar</a> 
                    </button>
                </form>
            </div>
        </div>
</body>
</html>