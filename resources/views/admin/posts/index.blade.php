@extends('layouts.dashboard')
@section('content')

<table class="table">
    <thead>
        <tr>
            <th scope="col">#id</th>
            <th scope="col">Title</th>
            <th scope="col">Body</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td>
                <a href="{{route('admin.posts.show', $post->id)}}">
                    {{$post->title}}</td>
                </a>
            <td>{{$post->body}}</td>
            <td>icons</td>
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