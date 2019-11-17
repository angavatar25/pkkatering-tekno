<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Food</title>
</head>
<body>
    <a href="{{route('food.create')}}"><button>Create</button></a>
    <table>
        <tr>
            <th>Nama</th>
            <th>Harga</th>
            <th>Catatan</th>
            <th></th>
        </tr>
        @foreach ($data as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->notes}}</td>
                <td>
                    <form action="{{route('food.edit')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$item->id}}">
                        <button type="submit">Edit</button>
                    </form>

                    <form action="{{route('food.delete')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$item->id}}">
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>