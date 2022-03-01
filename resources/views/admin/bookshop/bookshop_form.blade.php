@extends('assets.base')

@section('content')
@if (!empty($bookshop))
    <h1>{{$bookshop->name}} - Edit Bookshop</h1>
    <form action="{{ action('Admin\BookshopController@update', ['id' => $bookshop->id]) }}" method="post">
        @method('PUT')
    @else
    <h1>Create a new Bookshop</h1>
    <form action="{{ action('Admin\BookshopController@store') }}" method="post">
@endif
    @csrf
    <div class="form__field form__bookshop--name">
        <label for="bookshop_name">Bookshop Name</label> <br/>
        <input id="bookshop_name" name="bookshop_name" type="text" value="{{$bookshop->name ?? old('bookshop_name')}}">
    </div>

    <div class="form__field form__bookshop--city">
        <label for="bookshop_city">City</label> <br/>
        <input id="bookshop_city" name="bookshop_city" type="text" value="{{$bookshop->city ?? old('bookshop_city')}}">
    </div>

    <div class="form__field form__bookshop--submit">
        <input type="submit" value="Save Bookshop">
    </div>
</form>
@endsection
