{{-- {{dd($data)}} --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transaction</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>Transaction ID</th>
            <th>Pembeli</th>
            <th>Nama Makanan</th>
            <th>Gambar Makanan</th>
            <th>Harga Satuan</th>
            <th>Jumlah Pembelian</th>
            <th>Total Harga</th>
        </tr>
        @foreach ($data as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->user->name}}</td>
                <td>{{$item->food->name}}</td>
                <td><img src="{{asset($item->food->file)}}" alt="{{$item->food->name}}" style="width:100px; height:auto;" onerror="this.onerror=null;this.src='{{asset('404.jpg')}}';"></td>
                <td>{{$item->food->price}}</td>
                <td>{{$item->amount}}</td>
                <td>{{$item->total_payment_amount}}</td>
                <td>
                    <a href="{{route('transaction.detail', ['id' => $item->id])}}">
                        <button>Detail</button>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>