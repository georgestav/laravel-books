@extends('assets.base')

@section('content')

<form action="{{ route('register') }}" method="post">
    @csrf
    <div>
        <label for="">Name: </label>
        <input type="text" name="name" placeholder="name" value="{{ old('name') }}">
    </div>
    
    <div>
        <label for="">email: </label>
        <input type="email" name="email" placeholder="email" value="{{ old('email') }}">
    </div>

    <div>
        <label for="">password: </label>
        <input type="password" name="password" placeholder="password" value="">
    </div>
    
    <div>
        <label for="">confirm password: </label>
        <input type="password" name="password_confirmation" placeholder="confirm password" value="">
    </div>
    
    <button>Register</button>
</form>

@endsection