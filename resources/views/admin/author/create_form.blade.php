@extends('assets.base')

@section('content')
@if (!empty($author))
<form action="{{ action('Admin\AuthorController@update') }}" method="post">
@else
<form action="{{ action('Admin\AuthorController@store') }}" method="post">
        
    @endif
    @dump($author ?? null)
    @csrf
    <label for="author_name">Authors Name
        <input id="author_name" name="author_name" type="text" value="{{$author->name ?? null}}">
    </label>
    <label for="author_last_name">Authors last name
        <input id="author_last_name" name="author_last_name" type="text" value="{{$author->name ?? null }}">
    </label>
    <label for="author_bio">
        <textarea name="author_bio" id="author_bio" cols="30" rows="10">{{$author->bio ?? null}}</textarea>
    </label>
    <input type="submit" value="Save Author">
</form>
@endsection
