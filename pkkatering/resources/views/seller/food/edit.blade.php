<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('layout.head')
    <title>Edit Food</title>
</head>
<body>
    <div class="container seller-edit">
        <h1>Edit Data Makanan</h1>
        <form action="{{route('food.update')}}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$data->id}}">
            <table>
                <tr>
                    <td><label for="name">Nama</label></td>
                    <td><input type="text" name="name" value="{{$data->name}}"></td>
                </tr>
                <tr>
                    <td><label for="price">Harga</label></td>
                    <td><input type="number" name="price" value="{{$data->price}}"></td>
                </tr>
                <tr>
                    <td><label for="notes">Catatan</label></td>
                    <td><input type="text" name="notes" value="{{$data->notes}}"></td>
                </tr>
                <tr>
                    <td><label for="image">Foto</label></td>
                    <td><input type="file" name="image"></td>
                </tr>
            </table>
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
</body>
</html>