<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('layout.head')
    <title>Input Bukti Transaksi</title>
</head>
<body>
    <div class="container upload-bukti">
        <div class="navbar-container">
            <div class="main-container">
                <h1 class="title">PKKatering</h1>
                <div class="link-container">
                    <a href="#" class="link active">Home</a>
                    <a href="#" class="link">History</a>
                    <a href="#" class="link">Pengaturan</a>
                </div>
            </div>
            <div class="logout-container">
                <a href="#">Log Out</a>
            </div>
        </div>
        <h1>Upload Bukti Transaksi</h1>
        <div class="content">
            <p>Unggah bukti transaksi anda</p>
            <input type="file" name="input-bukti">
        </div>
        <a href="#"><button class="btn btn-primary">Unggah</button></a>
        <p class="pop-message">Unggah Berhasil, Mohon Tunggu untuk persetujuan transaksi</p>
    </div>
<script>
    $(".btn-primary").click(function() {
        $(".pop-message").css("display","block");
    })
</script>
</body>
</html>