<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" />
    <style>
        form{
            width: 350px;
            background-color: #eee;
        }
        input,textarea{
            border: 0;
            outline: 0;
            border-bottom: 2px solid #0d6efd;
        }
    </style>
    <title>Add Task</title>
</head>
<body style="margin-top: 150px" >

<h3 style="margin-left: 700px">Add Task</h3>
<!-- /resources/views/post/create.blade.php -->


{{--@if ($errors->any())--}}
{{--    <div class="alert alert-danger">--}}
{{--        <ul>--}}
{{--            @foreach ($errors->all() as $error)--}}
{{--                <li>{{ $error }}</li>--}}
{{--            @endforeach--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--@endif--}}

<!-- Create Post Form -->
<form action="{{route("tasks.store")}}" method="post" class="p-3 d-flex flex-column mx-auto mt-5 shadow-lg rounded">
    @csrf
    <label>Title</label>
    <input type="text" name="title" class="mb-4 rounded" value="{{old('title')}}" class="@error('title') is-invalid @enderror">
    {{-- Error Message if the title not found --}}
    @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <label>Comment</label>
    <textarea name="comment"  class="@error('comment') is-invalid @enderror">{{old('comment')}}</textarea>
    {{-- Error Message if the comment not found --}}
    @error('comment')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <button class="btn bg-success w-50 text-white mx-auto mt-3">Add</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
