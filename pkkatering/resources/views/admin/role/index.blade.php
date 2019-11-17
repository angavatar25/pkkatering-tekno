<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>role</title>
</head>
<body>
    {{Session::get('message') ?? ''}}
    <br>
    <a href="{{route('role.create')}}"><button>create</button></a>
    <table>
        <tr>
            <th>name</th>
            <th>desc</th>
            <th>action</th>
        </tr>
        @foreach ($data as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->description}}</td>
                <td>
                    <form action="{{route('role.edit')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$item->id}}">
                        <button type="submit">update</button>
                    </form>

                    <form action="{{route('role.delete')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$item->id}}">
                        <button type="submit">delete</button>
                    </form>

                    <a href="{{route('role.assignee', ['id'=>$item->id])}}">
                        <button>assign</button>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>