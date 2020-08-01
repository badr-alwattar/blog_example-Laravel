@extends('layouts.app')

@section('content')
<div class="container">
    
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="card my-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h3> {{$post->title}} </h3>
                            <small> {{$post->created_at}} </small>
                            <p> {{$post->body}} </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-right">
                            @if($post->user_id == Auth::id())
                            <a href="posts/{{$post->id}}/edit" class="btn btn-warning d-inline" role="button">Edit</a>
                            <form action="/posts/{{$post->id}}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Dalete</button>
                            </form>
                            @endif
                            <a href="posts/{{$post->id}}" class="btn btn-primary d-inline" role="button">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
    <h3 class="text-danger"> No posts yet </h3>
    @endif
</div>
@endsection