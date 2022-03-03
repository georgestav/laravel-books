@extends('assets.base')

@section('content')
<div>
    <div>Name: <div>{{$bookshop->name}}</div></div>
    <div>City: <div>{{$bookshop->city}}</div></div>
    <br/>
    <div>Updated at: <div>{{$bookshop->updated_at}}</div></div>
    <br/>
    @auth        
    <div>
        <form action="{{ action('Admin\BookshopController@destroy', ['id' => $bookshop->id])}}" method="post">
            @method('DELETE')
            @csrf
            <input type="submit" value="Delete">
        </form>        
        <form action="{{ action('Admin\BookshopController@edit', ['id' => $bookshop->id])}}" method="get">
            @csrf
            <input type="submit" value="Edit">
        </form>
    </div>
    @endauth
    
    <div class="books__available"> {{-- List available books in the bookstore --}}
        <h4>Available books in the bookstore:</h4>
        <ul>
            @foreach ($bookshop->book as $book)
            <li><a href="{{ action('Admin\BookController@show', ['id' => $book->id])}}">{{$book->title}}</a>{{count($book->reviews)}} reviews</li>
            @endforeach
        </ul>
    </div>{{-- List available books in the bookstore --}}
   
</div>
@endsection
