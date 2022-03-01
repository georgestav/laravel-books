@extends('assets.base')

@section('content')

<div class="count__authors" style="margin: 1rem 0">
    {{count($authors)}} Authors Displaying
</div>
    <ul>
        @foreach ($authors as $author)
        <li><a class="author__link" href="{{ action('Admin\AuthorController@show', ['id' => $author->id])}}">{{$author->name}}</a><span class="author__bio--info">{{ $author->bio ? 'Read the bio' : 'Add a bio'}}</span></li>
        @endforeach
    </ul>
@endsection