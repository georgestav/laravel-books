@extends('assets.base')

@section('content')

<div class="count__bookshops" style="margin: 1rem 0">
    {{count($bookshops)}} Bookshops Displaying
</div>
    <ul>
        @foreach ($bookshops as $bookshop)
        <li><a class="bookshop__link" href="{{ action('Admin\BookshopController@show', ['id' => $bookshop->id])}}">{{$bookshop->name}}</a> found in: {{$bookshop->city}}</li>
        @endforeach
    </ul>
@endsection