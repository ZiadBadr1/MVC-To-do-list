<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>All Tasks</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
<body >
@include("layouts.nav")
<br>
<h2 style="text-align: center">Your Tasks</h2>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Comment</th>
        <th scope="col">pro</th>

    </tr>
    </thead>
    <tbody>
    @foreach($tasks as $task)
        <tr>
            <th scope="row">#</th>
            <td>{{$task->title}}</td>
            <td>{{$task->comment}}</td>
            <td>
                <a class="btn btn-primary" href="{{route('tasks.edit',$task->id)}}" role="button">Edit</a>
                <form method="post" action="{{route("tasks.destroy",$task->id)}}">
                    @method('DELETE')
                    @CSRF
                    <button  type="submit" style="background-color: crimson ;margin-top: 10px">Soft Delete</button>
                </form>
{{--                <a class="btn btn-danger" href="{{route('tasks.destroy',$task->id)}}" role="button">Delete</a>--}}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<a class="btn btn-success" href="{{route('tasks.create')}}" role="button" style="margin-right: 25px ; margin-left: 700px">Add Task</a>

<a class="btn btn-danger" href="{{route('tasks.showDeletedTask')}}" role="button">Deleted Tasks</a>

</body>
</html>
