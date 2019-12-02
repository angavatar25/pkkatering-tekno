<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('layout.head')
    <title>Food</title>
</head>
<body>
    <div class="container seller-food">
        <h1>Data Menu Makanan</h1>
        <table>
            <tr>
                <th>Nama</th>
                <th>Harga</th>
                <th>Catatan</th>
                <th>Action</th>
            </tr>
            @foreach ($data as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->notes}}</td>
                    <td class="button-action">
                        <form action="{{route('food.edit')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$item->id}}">
                            <button class="btn btn-primary" type="submit">Edit</button>
                        </form>

                        <form action="{{route('food.delete')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$item->id}}">
                            <button class="btn btn-red" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <a href="{{route('food.create')}}"><button class="btn btn-primary">Buat Menu Baru</button></a>
    </div>
</body>
</html>