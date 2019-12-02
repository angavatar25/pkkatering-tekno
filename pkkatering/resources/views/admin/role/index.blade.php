<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('layout.head')
    <title>role</title>
</head>
<body>
    <div class="container admin-role">
        {{Session::get('message') ?? ''}}
        <br>
        <a href="{{route('role.create')}}"><button class="btn btn-primary btn-create">Create</button></a>
        <table style="width: 100%;">
            <tr class="header-table">
                <th><h2>Name</h2></th>
                <th><h2>Description</h2></th>
                <th><h2>Action</h2></th>
            </tr>
            @foreach ($data as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->description}}</td>
                    <td class="btn-action">
                        <form action="{{route('role.edit')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$item->id}}">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </form>

                        <form action="{{route('role.delete')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$item->id}}">
                            <button class="btn btn-red" type="submit">Delete</button>
                        </form>

                        <a href="{{route('role.assignee', ['id'=>$item->id])}}">
                            <button class="btn btn-blue">Assign</button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>