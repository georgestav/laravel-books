@extends('assets.base')

@section('content')
<div class="count__authors">
    {{count($authors)}} Authors found
</div>
    <ul>
        @foreach ($authors as $author)
        <li><a href="{{ action('Admin\AuthorController@show', ['id' => $author->id])}}">{{$author->name}}</a></li>
        @endforeach
    </ul>
@endsection