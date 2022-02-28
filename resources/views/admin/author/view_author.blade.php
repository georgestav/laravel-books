@extends('assets.base')

@section('content')
<div>
    <div>Name: {{$author->name}}</div>
    <div>Bio: {{$author->bio}}</div>
    <div>Updated at: {{$author->updated_at}}</div>
    <div>
        <form action="{{ action('Admin\AuthorController@destroy', ['id' => $author->id])}}" method="post">
            @method('DELETE')
            @csrf
            <input type="submit" value="Delete">
        </form>        
        <form action="/admin/authors/{{$author->id}}/edit" method="get">
            @csrf
            <input type="submit" value="Edit">
        </form>
    </div>
</div>
@endsection
