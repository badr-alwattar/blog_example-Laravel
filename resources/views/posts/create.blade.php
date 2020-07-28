@extends('layouts.app')

@section('content')
<div class="container">
    @if (isset($success))
        <div class="alert alert-success" role="alert">
            {{$success}}
        </div>
    @endif
    <h2> Create Post </h2>
        <form action="/posts" method="post"> 
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" required>
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea class="form-control" name="body" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
</div>
@endsection