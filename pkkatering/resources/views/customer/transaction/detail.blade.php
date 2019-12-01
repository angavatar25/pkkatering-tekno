{{-- {{dd($data)}} --}}
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
                    <form action="{{route('transaction.proof')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$data->id}}">
                        <input type="file" name="image">
                        <button type="submit">Submit</button>
                    </form>
                @endif
            </td>
        </tr>
        <tr>
            <td>Status Pemesanan</td>
            <td>{{$data->status}}</td>
        </tr>
    </table>
</body>
</html>