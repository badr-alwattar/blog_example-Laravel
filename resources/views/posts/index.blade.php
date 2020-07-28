@extends('layouts.app')

@section('content')
<div class="container">
    
    @if(!empty($posts))
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
                            <a href="posts/{{$post->id}}" class="btn btn-primary" role="button">Read more</a>
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