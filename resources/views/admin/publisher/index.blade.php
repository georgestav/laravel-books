@extends('assets.base')

@section('content')

<div class="count__publishers" style="margin: 1rem 0">
    {{count($publishers)}} Publishers Displaying
</div>
    <ul>
        @foreach ($publishers as $publisher)
        <li><a class="publisher__link" href="{{ action('Admin\PublisherController@show', ['id' => $publisher->id])}}">{{$publisher->name}}</a></li>
        @endforeach
    </ul>
@endsection