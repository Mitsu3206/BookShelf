@extends('layouts.bookshelf')

@section('homelink', 'Home')

@section('title', '本をさがす')

@section('content')
        <form action="/bookshelf/destroyBulk" method="post">
        @csrf
    @if($items == null)
        <p>登録している本はありません。</p>
    @else
        <table>
            <tr><th></th><th>タイトル</th><th>著者名</th><th>出版社</th>
            @foreach($items as $item)
                <tr>
                    <td><input type="checkbox" name="id[]" value="{{$item->id}}"></td>
                    <td><a href="/bookshelf/edit/{{$item->id}}">{{$item->title}}</a></td>
                    <td>{{$item->author}}</td>
                    <td>{{$item->publisherName}}</td>
                </tr>
            @endforeach
        </table>
        {{ $items->links() }}
        <input type="submit" value="削除">
    @endif
@endsection