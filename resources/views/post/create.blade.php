@extends('layouts.app')

@section('content')

    <form action="{{url('posts')}}" method="POST">
        {!! csrf_field() !!}
        <label for="text"> Текст поста</label>
        <input id="text" name="text" type="text">
        <select name="water">
            @foreach(\App\Models\Water::all() as $water)
                <option value="{{$water->id}}">{{$water->name}}</option>
            @endforeach
        </select>
        <input type="submit" value="Сохранить"/>

    </form>

@endsection