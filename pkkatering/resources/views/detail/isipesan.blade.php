<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout.head')
    <title>Isi Biodata</title>
</head>
<body>
    <div class="isi-biodata container">
        <div class="navbar-container">
            <div class="main-container">
                <a class="title">PKKatering</a>
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
        <form action="" class="form-container">
            <h2 class="title">Isi Detail Pesanan</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="input-container">
                        <p>Nama Depan</p>
                        <input type="text">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-container">
                        <p>Nama Belakang</p>
                        <input type="text">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-container">
                        <p>Alamat Tujuan</p>
                        <input type="text">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-container">
                        <p>Nomor Telepon Penerima</p>
                        <input type="tel" id="phonenumber" name="phone" pattern="[0-9]{4}-[0-9]{4}-[0-9]{4}" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <h2 class="title">Banyaknya Pesanan</h2>
                    <p>Jumlah</p>
                    <input type="number">
                </div>
                <div class="col-md-8">
                    <h2 class="title">Pengantaran</h2>
                    <div class="choices-container">
                        <input type="radio" name="bayar" value="goride"> Go-Ride
                        <input type="radio" name="bayar" value="grabsend"> Grab Send
                        <input type="radio" name="bayar" value="ambilsendiri"> Ambil Sendiri
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <h2 class="title">Pembayaran</h2>
                    <div class="choices-container">
                        <input type="radio" name="transfer" value="transferbank"> Transfer Bank
                        <input type="radio" name="transfer" value="gopay"> Go Pay
                        <input type="radio" name="transfer" value="ovo"> OVO
                    </div>
                </div>
            </div>
            <div class="total-harga row">
                <div class="col-md-12">
                    <div class="total-container">
                        <p class="harga-total" id="harga-total">Total: (Harga Total Transaksi)</p>
                        <button class="button"><a href="">Proses</a></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>