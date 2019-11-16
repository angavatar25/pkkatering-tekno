<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Restaurant Create</title>
</head>
<body>
    <form action="{{route('restaurant.store')}}" method="post">
        @csrf
        <input type="hidden" name="user_id" value="{{$data->user_id ?? ''}}">
        <table>
            <tr>
                <td><label for="name">Nama Restaurant</label></td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td><label for="address">Alamat Restaurant</label></td>
                <td><input type="text" name="address"></td>
            </tr>
            <tr>
                <td><label for="owner">Nama Pemilik</label></td>
                <td><input type="text" name="owner" value="{{$data->owner ?? ''}}"></td>
            </tr>
            <tr>
                <td><label for="contact">Nomor HP</label></td>
                <td><input type="text" name="contact"></td>
            </tr>
            <tr>
                <td><label for="email">Email</label></td>
                <td><input type="text" name="email"></td>
            </tr>
        </table>
        <button type="submit">Submit</button>
    </form>
</body>
</html>