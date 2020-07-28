@extends('layouts.app')

@section('content')
<div class="container">
    <h2> Create Post </h2>
        <form action="posts" method="post">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea class="form-control" name="body"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
</div>
@endsection