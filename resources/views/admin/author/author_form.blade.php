@extends('assets.base')

@section('content')
@if (!empty($author))
    <h1>{{$author->name}} - Edit Author</h1>
    <form action="{{ action('Admin\AuthorController@update', ['id' => $author->id]) }}" method="post">
        @method('PUT')
    @else
    <h1>Create a new Author</h1>
    <form action="{{ action('Admin\AuthorController@store') }}" method="post">
@endif
    @csrf
    <div class="form__field form__author--name">
        <label for="author_name">Authors Name</label> <br/>
        <input id="author_name" name="author_name" type="text" value="{{$author->name ?? old('author_name')}}">
    </div>
    
    <div class="form__field form__author--bio">
        <label for="author_bio"></label>
        <textarea name="author_bio" id="author_bio" cols="20" rows="5">{{$author->bio ?? old('author_bio')}}</textarea>
    </div>

    <div class="form__field form__author--submit">
        <input type="submit" value="Save Author">
    </div>
</form>
@endsection
