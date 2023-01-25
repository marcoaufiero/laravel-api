@extends('layouts.dashboard')
@section('content')
    
    <div class="text-center">
        <h1>Crea un post</h1>
    </div>

    <form action="{{route('admin.posts.update', $post->id)}}" method="POST">
        
        @csrf
        @method('PUT')

        <div class="my-3">
            <label class="form-label" for="">Title</label>
            <input value="{{$post->title}}" class="form-control" @error('title') is invalid @enderror type="text" name="title">
            @error('title')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="my-3">
            <label class="form-label" for="">Body</label>
            <textarea class="form-control" @error('body') is invalid @enderror name="body">{{$post->body}}</textarea>
            @error('body')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Edit</button>
    </form>

@endsection