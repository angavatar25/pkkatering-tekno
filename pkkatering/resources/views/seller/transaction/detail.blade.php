<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transaction Detail</title>
</head>
<body>
    <table border="1">
        <tr>
            <td>Nama Makanan</td>
            <td>{{$data->food->name}}</td>
        </tr>
        <tr>
            <td>Foto Makanan</td>
            <td><img src="{{asset($data->food->file)}}" alt="{{$data->food->name}}" style="width:100px; height:auto;" onerror="this.onerror=null;this.src='{{asset('404.jpg')}}';"></td>
        </tr>
        <tr>
            <td>Nama Pemesan</td>
            <td>{{$data->name}}</td>
        </tr>
        <tr>
            <td>Alamat Pemesanan</td>
            <td>{{$data->address}}</td>
        </tr>
        <tr>
            <td>Nomor Telepon</td>
            <td>{{$data->phone}}</td>
        </tr>
        <tr>
            <td>Cara Pengiriman</td>
            <td>{{$data->delivery_type}}</td>
        </tr>
        <tr>
            <td>Cara Pembayaran</td>
            <td>{{$data->payment_type}}</td>
        </tr>
        <tr>
            <td>Total Makanan Dipesan</td>
            <td>{{$data->amount}}</td>
        </tr>
        <tr>
            <td>Bukti Pembayaran</td>
            <td>
                @if ($data->proof)
                    <img src="{{asset($data->proof)}}" alt="Bukti Pembayaran" style="width:100px; height:auto;" onerror="this.onerror=null;this.src='{{asset('404.jpg')}}';">
                @else
                    Belum ada bukti pembayaran
                @endif
            </td>
        </tr>
        <tr>
            <td>Status Pemesanan</td>
            <td>{{$data->status}}</td>
        </tr>
    </table>
    <br>
    Rubah Status Pesanan
    <form action="{{route('transaction.status')}}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$data->id}}">
        <input type="hidden" name="status" id="status" value="0">
        <button type="submit" onmouseover="change_status(0)">Menunggu Pembayaran</button>
        <button type="submit" onmouseover="change_status(1)">Menunggu Konfirmasi Restaurant</button>
        <button type="submit" onmouseover="change_status(2)">Pesanan Dikonfirmasi</button>
        <button type="submit" onmouseover="change_status(3)">Pesanan Siap Dikirim atau Diambil</button>
        <button type="submit" onmouseover="change_status(4)">Pesanan Selesai</button>
    </form>

    <script>
        function change_status(ke)
        {
            let input_status
            input_status = document.getElementById('status')
            input_status.value = ke
        }
    </script>
</body>
</html>