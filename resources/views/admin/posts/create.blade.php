@extends('layouts.dashboard')
@section('content')
    
    <div class="text-center">
        <h1>Crea un post</h1>
    </div>

    <form action="{{route('admin.posts.store')}}" method="POST">
        @csrf

        <div class="my-3">
            <label class="form-label" for="">Title</label>
            <input class="form-control" @error('title') is invalid @enderror type="text" name="title">
            @error('title')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="my-3">
            <label class="form-label" for="">Body</label>
            <textarea class="form-control" @error('body') is invalid @enderror name="body"></textarea>
            @error('body')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="my-3">
            
        </div>
        <button type="submit" class="btn btn-success">Send</button>
    </form>

@endsection