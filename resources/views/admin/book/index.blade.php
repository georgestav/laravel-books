@extends('assets.base')

@section('content')

<div class="count__books" style="margin: 1rem 0">
    {{count($books)}} Books Displaying
</div>
    <ul>
        @foreach ($books as $book)
        <li><a class="book__link" href="{{ action('Admin\BookController@show', ['id' => $book->id])}}">{{$book->title}}</a></li>
        @endforeach
    </ul>
@endsection