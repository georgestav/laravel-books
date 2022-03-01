@extends('assets.base')

@section('content')
<div>
    <div>Name: <div>{{$publisher->name}}</div></div>
    <div>Updated at: <div>{{$publisher->updated_at}}</div></div>
    <div>
        <form action="{{ action('Admin\PublisherController@destroy', ['id' => $publisher->id])}}" method="post">
            @method('DELETE')
            @csrf
            <input type="submit" value="Delete">
        </form>        
        <form action="{{ action('Admin\PublisherController@edit', ['id' => $publisher->id])}}" method="get">
            @csrf
            <input type="submit" value="Edit">
        </form>
    </div>
</div>
@endsection
