<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Restaurant</title>
</head>
<body>
    <form action="{{route('restaurant.update')}}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$data->id}}">
        <table>
            <tr>
                <td><label for="name">Nama Restaurant</label></td>
                <td><input type="text" name="name" value="{{$data->name}}"></td>
            </tr>
            <tr>
                <td><label for="address">Alamat Restaurant</label></td>
                <td><input type="text" name="address" value="{{$data->address}}"></td>
            </tr>
            <tr>
                <td><label for="owner">Nama Pemilik</label></td>
                <td><input type="text" name="owner" value="{{$data->ownerName}}"></td>
            </tr>
            <tr>
                <td><label for="contact">Nomor HP</label></td>
                <td><input type="text" name="contact" value="{{$data->contact}}"></td>
            </tr>
            <tr>
                <td><label for="email">Email</label></td>
                <td><input type="text" name="email" value="{{$data->email}}"></td>
            </tr>
        </table>
        <button type="submit">Submit</button>
</body>
</html>