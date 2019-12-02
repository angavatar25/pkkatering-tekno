<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('layout.head')
    <title>Create</title>
</head>
<body>
    <div class="container admin-edit">
        <h1>Isi Nama dan Deskripsi</h1>
        <form action="{{route('role.update')}}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$data->id}}">
            <div class="input">
                <label for="name">Nama</label>
                <input type="text" name="name" disabled="disabled" value="{{$data->name}}">
            </div>
            <div class="input">
                <label for="description">Deskripsi</label>
                <input type="text" name="description"  value="{{$data->description}}">
            </div>
            <button class="btn btn-primary" type="submit">submit</button>
        </form>
    </div>
</body>
</html>