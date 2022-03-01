@extends('assets.base')

@section('content')
<div>
    <div>Name: <div>{{$author->name}}</div></div>
    <div>Biography: <div>{{$author->bio}}</div></div>
    <div>Updated at: <div>{{$author->updated_at}}</div></div>
    
    @auth
    <div>
        <form action="{{ action('Admin\AuthorController@destroy', ['id' => $author->id])}}" method="post">
            @method('DELETE')
            @csrf
            <input type="submit" value="Delete">
        </form>        
        <form action="{{ action('Admin\AuthorController@edit', ['id' => $author->id])}}" method="get">
            @csrf
            <input type="submit" value="Edit">
        </form>
    </div>
    @endauth
</div>
@endsection
