<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout.head')
    <title>Makanan</title>
</head>
<body>
    <div class="makanan container">
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
        <div class="menu-makanan">
            <div class="row">
                <div class="col-md-6">
                    <div class="image-container">
                        <img src="" alt="gambar-makanan">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="detail-container">
                        <h3 class="title">Ayam Goreng Crispy</h3>
                        <p class="nama-restoran">Nama Restoran</p>
                        <p class="alamat-restoran"></p>
                        <p class="harga">Rp. Harga</p>
                        <button class="button"><a href="{{ url('isidata') }}">Beli</a></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="ketentuan-pemesanan">
            <h2 class="title">Ketentuan Pemesanan</h2>
            <div class="daftar-ketentuan">
                <li>Isi ketentuan makanan</li>
            </div>
        </div>
        <div class="rekomendasi-makanan">
            <h2 class="title">Rekomendasi Makanan</h2>
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
                                <span>Harga Makanan</span>
                            </div>
                            <button class="button-card"><a href="{{ url('home/makanan') }}">Beli</a></button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="image-container">
                            <img src="" alt="img-food">
                        </div>
                        <div class="content-container">
                            <h4 class="title">Nama Makanan</h4>
                            <div class="detail-container">
                                <span>Nama Restoran</span>
                                <span>Harga Makanan</span>
                            </div>
                            <button class="button-card"><a href="{{ url('home/makanan') }}">Beli</a></button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="image-container">
                            <img src="" alt="img-food">
                        </div>
                        <div class="content-container">
                            <h4 class="title">Nama Makanan</h4>
                            <div class="detail-container">
                                <span>Nama Restoran</span>
                                <span>Harga Makanan</span>
                            </div>
                            <button class="button-card"><a href="{{ url('home/makanan') }}">Beli</a></button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="image-container">
                            <img src="" alt="img-food">
                        </div>
                        <div class="content-container">
                            <h4 class="title">Nama Makanan</h4>
                            <div class="detail-container">
                                <span>Nama Restoran</span>
                                <span>Harga Makanan</span>
                            </div>
                            <button class="button-card"><a href="{{ url('home/makanan') }}">Beli</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>