<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('layout.head')
    <title>Restaurant</title>
</head>
<body>
    <div class="container seller-restaurant">
        <h1>Data Pemilik Restauran</h1>
        <table>
            <tr>
                <td><h2>Nama</h2></td>
                <td><h3>{{$data->name}}</h3></td>
            </tr>
            <tr>
                <td><h2>Alamat</h2></td>
                <td><h3>{{$data->address}}</h3></td>
            </tr>
            <tr>
                <td><h2>Nama Pemilik</h2></td>
                <td><h3>{{$data->ownerName}}</h3></td>
            </tr>
            <tr>
                <td><h2>No. Handphone</h2></td>
                <td><h3>{{$data->contact}}</h3></td>
            </tr>
            <tr>
                <td><h2>E-mail</h2></td>
                <td><h3>{{$data->email}}</h3></td>
            </tr>
            <tr>
                <td>
                    <form action="{{route('restaurant.edit')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$data->id}}">
                        <button class="btn btn-primary" type="submit">Edit</button>
                    </form>
                </td>
                <td>
                    <form action="{{route('restaurant.delete')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$data->id}}">
                            <button class="btn btn-red" type="submit">Delete</button>
                        </form>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>