<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('layout.head')
    <title>Food List</title>
</head>
<body>
    <div class="container customer-food">
        <h1>Daftar Makanan</h1>
        <table border="1">
            <tr>
                <th>Restaurant</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Catatan</th>
                <th>Foto</th>
            </tr>
            @foreach ($data as $food)
                <tr>
                    <td>{{$food->restaurant}}</td>
                    <td>{{$food->name}}</td>
                    <td>{{$food->price}}</td>
                    <td>{{$food->notes}}</td>
                    <td><img src="{{ asset($food->file) }}" alt="{{$food->name}}" style="width:100px; height:auto;" onerror="this.onerror=null;this.src='{{asset('404.jpg')}}';"></td>
                    <td>
                        <form action="{{route('transaction.create')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$food->id}}">
                            <button type="submit">Pesan</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>