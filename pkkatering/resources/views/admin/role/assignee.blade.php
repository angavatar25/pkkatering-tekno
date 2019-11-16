<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>assignee</title>
</head>
<body>
    <form action="{{route('role.assign')}}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$id}}">
        <table>
            <tr>
                <th>User</th>
                <th>Role</th>
                <th></th>
            </tr>
            @foreach ($data as $item)
            <tr>
                <td>{{$item->user}}</td>
                <td>{{$item->role}}</td>
                <td><input type="checkbox" name="user_id[]" value="{{$item->user_id}}"></td>
            </tr>
            @endforeach
        </table>
        <button type="submit">submit</button>
    </form>
</body>
</html>