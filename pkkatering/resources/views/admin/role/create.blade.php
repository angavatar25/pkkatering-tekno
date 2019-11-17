<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create</title>
</head>
<body>
    <form action="{{route('role.store')}}" method="post">
        @csrf
        <label for="name">name</label>
        <input type="text" name="name">
        <label for="description">description</label>
        <input type="text" name="description">
        <button type="submit">submit</button>
    </form>
</body>
</html>