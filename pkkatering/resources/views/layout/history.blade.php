<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout.head')
    <title>Riwayat Transaksi</title>
</head>
<body>
    <div class="history container px-0">
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
        <h1 class="title">Riwayat Transaksi</h1>
        <span class="date">11 November 2019</span>
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="image-container">
                        <img src="" alt="img-food">
                    </div>
                    <div class="content-container">
                        <h4 class="title">Nama Makanan</h4>
                        <div class="detail-container">
                            <span>Nama Restoran</span>
                            <span>30 Bungkus</span>
                        </div>
                        <button class="button-card history"><a href="{{ url('home/makanan') }}">Berhasil</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>