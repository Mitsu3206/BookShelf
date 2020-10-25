@extends('layouts.bookshelf')

@section('homelink', 'Home')

@section('title', '検索結果')

@section('content')
        <form action="/bookshelf/storeAPI" method="post">
        @csrf
    @if($infos == null)
        <p>一致する本はありませんでした。</p>
    @else
        <table>
            <tr><th></th><th>タイトル</th><th>著者名</th><th>出版社</th>
            @foreach($infos as $info)
                <tr>
                    <td><input type="checkbox" name="id[]" value="{{$info['id']}}"></td>
                    <td>{{$info["title"]}}</td>
                    <td>{{$info["author"]}}</td>
                    <td>{{$info["publisherName"]}}</td>
                </tr>
            @endforeach
        </table>
        <br>
        <input type="submit" value="追加">
    @endif
@endsection