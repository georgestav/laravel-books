@extends('assets.base')

@section('content')
@if (!empty($publisher))
    <h1>{{$publisher->name}} - Edit Publisher</h1>
    <form action="{{ action('Admin\PublisherController@update', ['id' => $publisher->id]) }}" method="post">
        @method('PUT')
    @else
    <h1>Create a new Publisher</h1>
    <form action="{{ action('Admin\PublisherController@store') }}" method="post">
@endif
    @csrf
    <div class="form__field form__publisher--name">
        <label for="publisher_name">Publishers Name</label> <br/>
        <input id="publisher_name" name="publisher_name" type="text" value="{{$publisher->name ?? old('publisher_name')}}">
    </div>

    <div class="form__field form__publisher--submit">
        <input type="submit" value="Save Publisher">
    </div>
</form>
@endsection
