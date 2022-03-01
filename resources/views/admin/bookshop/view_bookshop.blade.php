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
</div>
@endsection
