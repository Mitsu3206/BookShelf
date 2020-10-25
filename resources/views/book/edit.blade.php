@extends('layouts.book')

@section('homelink', 'Home')

@section('title', '本を編集する')

@section('bookTitle', '・タイトル')

@section('author', '・著者名')

@section('publisherName', '・出版社')

@section('content')
    <form action="/bookshelf/edit/?id={{$info->id}}" method="post">
    @csrf
    <h1 class="h1">@yield('title')</h1>
    <h2 class="h2">@yield('bookTitle')</h2>
    <input class="input" type="text" name="title" value="{{$info->title}}">
    <h2 class="h2">@yield('author')</h2>
    <input class="input" type="text" name="author" value="{{$info->author}}">
    <h2 class="h2">@yield('publisherName')</h2>
    <input class="input" type="text" name="publisherName" value="{{$info->publisherName}}">
    <br>
    <br>
    <input class="button" type="submit" name="delete" value="削除">
    <input class="button" type="submit" name="update" value="更新">
@endsection