<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Food</title>
</head>
<body>
    <form action="{{route('food.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="restaurant_id" value="{{$data->restaurant_id}}">
        <table>
            <tr>
                <td><label for="name">Nama</label></td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td><label for="price">Harga</label></td>
                <td><input type="number" name="price"></td>
            </tr>
            <tr>
                <td><label for="notes">Catatan</label></td>
                <td><input type="text" name="notes"></td>
            </tr>
            <tr>
                <td><label for="image">Foto</label></td>
                <td><input type="file" name="image"></td>
            </tr>
        </table>
        <button type="submit">Submit</button>
    </form>
</body>
</html>