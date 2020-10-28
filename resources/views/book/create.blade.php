@extends('layouts.book')

@section('homelink', 'Home')

@section('title', '本を追加する')

@section('bookTitle', '・タイトル')

@section('author', '・著者名')

@section('publisherName', '・出版社')

@section('content')
    <form action="/bookshelf/create" method="post">
    @csrf
    <h1 class="h1">@yield('title')</h1>
    <h2 class="h2">@yield('bookTitle')</h2>
    <input class="input" type="text" name="title" value="{{old('title')}}">
    @error('title')
    <p class="error">{{$message}}</p>
    @enderror
    <h2 class="h2">@yield('author')</h2>
    <input class="input" type="text" name="author" value="{{old('author')}}">
    @error('author')
    <p class="error">{{$message}}</p>
    @enderror
    <h2 class="h2">@yield('publisherName')</h2>
    <input class="input" type="text" name="publisherName" value="{{old('publisherName')}}">
    @error('publisherName')
    <p class="error">{{$message}}</p>
    @enderror
    <br>
    <br>
    <input class="button" type="submit" name="search" value="検索">
    <input class="button" type="submit" name="add" value="追加">
@endsection