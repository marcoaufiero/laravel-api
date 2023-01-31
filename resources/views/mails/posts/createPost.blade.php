<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
            background-color: grey;
            color: white
        }
    </style>
</head>
<body>
    <h1>TITOLO: {{$post->title}}</h1>
    <p>DESCRIZIONE : {{$post->body}}</p>
    <p>CATEGORIA: {{$post->category->name}}</p>
    <ul>
        @foreach ($post->tags as $tag)
            <li>{{$tag->name}}</li>
        @endforeach
    </ul>
</body>
</html>