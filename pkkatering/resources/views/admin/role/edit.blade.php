<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create</title>
</head>
<body>
    <form action="{{route('role.update')}}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$data->id}}">
        <label for="name">name</label>
        <input type="text" name="name" disabled="disabled" value="{{$data->name}}">
        <label for="description">description</label>
        <input type="text" name="description"  value="{{$data->description}}"">
        <button type="submit">submit</button>
    </form>
</body>
</html>