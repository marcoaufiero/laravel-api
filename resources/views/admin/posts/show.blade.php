@extends('layouts.dashboard')
@section('content')
    <h1>{{$single_post->title}}</h1>
    <img class="img-fluid" src="{{asset("storage/$single_post->cover")}}" alt="">
    <p>{{$single_post->body}}</p>
@endsection