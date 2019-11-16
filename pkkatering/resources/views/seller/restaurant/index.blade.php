<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Restaurant</title>
</head>
<body>
    <a href="{{route('restaurant.create')}}"><button>Create</button></a>
    <table>
        <tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Nama Pemilik</th>
            <th>No. Handphone</th>
            <th>Email</th>
            <th></th>
        </tr>
        @foreach ($data as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->address}}</td>
                <td>{{$item->ownerName}}</td>
                <td>{{$item->contact}}</td>
                <td>{{$item->email}}</td>
                <td>
                    <form action="{{route('restaurant.edit')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$item->id}}">
                        <button type="submit">Edit</button>
                    </form>
                    <form action="{{route('restaurant.delete')}}" method="post">
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