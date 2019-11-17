<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Restaurant</title>
</head>
<body>
    <table>
        <tr>
            <td>Nama</td>
            <td>{{$data->name}}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>{{$data->address}}</td>
        </tr>
        <tr>
            <td>Nama Pemilik</td>
            <td>{{$data->ownerName}}</td>
        </tr>
        <tr>
            <td>No. Handphone</td>
            <td>{{$data->contact}}</td>
        </tr>
        <tr>
            <td>E-mail</td>
            <td>{{$data->email}}</td>
        </tr>
        <tr>
            <td>
                <form action="{{route('restaurant.edit')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$data->id}}">
                    <button type="submit">Edit</button>
                </form>
            </td>
            <td>
                <form action="{{route('restaurant.delete')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$data->id}}">
                        <button type="submit">Delete</button>
                    </form>
            </td>
        </tr>
    </table>
</body>
</html>