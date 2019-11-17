<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout.head')
    <title>Home</title>
</head>
<body>
    <div class="home-page container">
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
        </div>
    </div>
</body>
</html>