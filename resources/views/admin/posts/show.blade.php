@extends('layouts.dashboard')
@section('content')
    <h1>{{$single_post->title}}</h1>
    <p>{{$single_post->body}}</p>
@endsection