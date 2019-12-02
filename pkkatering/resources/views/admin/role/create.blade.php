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
    <div class="container admin-create">
        <form action="{{route('role.store')}}" method="post">
            @csrf
            <h1>Isi Nama dan Deskripsi</h1>
            <div class="input">
                <label for="name">Name</label>
                <input type="text" name="name">
            </div>
            <div class="input">
                <label for="description">Description</label>
                <input type="text" name="description">
            </div>
            <button class="btn btn-primary" type="submit">submit</button>
        </form>
    </div>
</body>
</html>