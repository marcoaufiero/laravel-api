@extends('layouts.dashboard')
@section('content')
<div class="my-3">
    <a href="{{route('admin.posts.create')}}">
        <button class="btn btn-primary">Add Post</button>
    </a>
</div>
<table class="table table-hover">
    <thead class="table-light">
        <tr>
            <th scope="col">#id</th>
            <th scope="col">Title</th>
            <th scope="col">Body</th>
            <th scope="col">Category</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td>
                <a class="text-decoration-none" href="{{route('admin.posts.show', $post->id)}}">
                    {{$post->title}}</td>
                </a>
            <td>{{$post->body}}</td>
            <td>
                @if($post->category)
                {{$post->category['name']}}
                @endif
            </td>
            <td>
                <a href="{{route('admin.posts.edit', $post->id)}}">
                    <button class="btn btn-dark text-info">Edit</button>
                </a>
                <form action="{{route('admin.posts.destroy', $post->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach    
    </tbody>
</table>


    @foreach ($posts as $post)
        
    @endforeach

    <div class="d-flex justify-content-center">
        {{$posts->links()}}
    </div>
@endsection