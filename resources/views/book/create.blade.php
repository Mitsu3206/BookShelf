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
    <input class="input" type="text" name="title">
    <h2 class="h2">@yield('author')</h2>
    <input class="input" type="text" name="author">
    <h2 class="h2">@yield('publisherName')</h2>
    <input class="input" type="text" name="publisherName">
    <br>
    <br>
    <input class="button" type="submit" name="search" value="検索">
    <input class="button" type="submit" name="add" value="追加">
@endsection