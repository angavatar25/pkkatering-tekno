<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('layout.head')
    <title>Restaurant Create</title>
</head>
<body>
    <div class="container owner-create">
        <h1>Isi Data Baru Pemilik</h1>
        <form action="{{route('restaurant.store')}}" method="post">
            @csrf
            <input type="hidden" name="user_id" value="{{$data->user_id ?? ''}}">
            <div class="row">
                <div class="col-md-6 input">
                    <label for="name">Nama Restaurant</label>
                    <input type="text" name="name">
                </div>
                <div class="col-md-6 input">
                    <label for="address">Alamat Restaurant</label>
                    <input type="text" name="address">
                </div>
                <div class="col-md-6 input">
                    <label for="owner">Nama Pemilik</label>
                    <input type="text" name="owner" value="{{$data->owner ??''}}">
                </div>
                <div class="col-md-6 input">
                    <label for="contact">Nomor HP</label>
                    <input type="text" name="contact">
                </div>
                <div class="col-md-6 input">
                    <label for="email">Email</label>
                    <input type="text" name="email">
                </div>
            </div>
            <!-- <table style="display: none;">
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
            </table> -->
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
</body>
</html>