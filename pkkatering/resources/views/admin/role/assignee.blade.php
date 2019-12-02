<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('layout.head')
    <title>assignee</title>
</head>
<body>
    <div class="container assign-role">
        <form action="{{route('role.assign')}}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$id}}">
            <table>
                <tr>
                    <th><h2>User</h2></th>
                    <th><h2>Role</h2></th>
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
            <button class="btn btn-primary" type="submit">submit</button>
        </form>
    </div>
</body>
</html>