@extends('assets.base')

@section('content')
<ul>
    @foreach ( $reviews as $review )
    
    <div style="margin: 1rem 0">
        <li>
            For the book: <div>{{$review->book->title}}</div> 
            user: <div>{{$review->user->name}}</div> 
            said: <div>{{$review->text}}</div>
        </li>
        @can('admin')

        <form action="{{ action('Admin\ReviewController@destroy', ['review' => $review])}}" method="post">
            @method('DELETE')
            @csrf
            <input type="submit" value="Delete">
        </form>
        @endcan
    </div>
    @endforeach
</ul>
@endsection