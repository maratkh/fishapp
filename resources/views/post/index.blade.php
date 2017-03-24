@extends('layouts.app')

@section('content')
<a href="/posts/create">Добавить </a>
    <br/>
    <ul>
    @foreach($posts as $post)
        <li>{{$post->text}} / на {{$post->water->name}}</li>
    @endforeach
    </ul>
@endsection