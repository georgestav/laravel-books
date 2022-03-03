@extends('assets.base')

@section('content')
<div>
    <div>Title: <div>{{$book->title}}</div></div>
    <img src="{{$book->image}}" alt="cover image of {{$book->title}}">
    <div>ISBN: <div>{{$book->isbn}}</div></div>
    <div>Pages: <div>{{$book->pages}}</div></div>
    <div>Language: <div>{{$book->language}}</div></div>
    <div>Format: <div>{{$book->format}}</div></div>
    <div>Edition: <div>{{$book->edition}}</div></div>
    <div>Description: <div>{{$book->description}}</div></div>
    
    <div>Published: <div>{{$book->publication_date}}</div></div>
    <div>Updated at: <div>{{$book->updated_at}}</div></div>
</div>
<div>
    <ul>
        @foreach ($book->bookshop as $available_book)
        <li><a class="bookshop__link" href="{{ action('Admin\BookshopController@show', ['id' => $available_book->id])}}">{{$available_book->name}}</a> found in: {{$available_book->city}}</li>
        @endforeach
    </ul>
</div>

@include('admin.review.review_form') {{-- Displays when logged in --}}


@include('admin.book.show_book_reviews')


@endsection
