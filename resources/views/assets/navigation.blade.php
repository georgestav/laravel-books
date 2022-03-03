<nav>
    <a href="{{action('Admin\BookController@index')}}">List of Books</a>
    <a href="{{action('Admin\AuthorController@index')}}">List of Authors</a>
    <a href="{{action('Admin\PublisherController@index')}}">List of Publishers</a>
    <a href="{{action('Admin\BookshopController@index')}}">List of Bookshops</a>
    
    {{-- if loged in display the logout button --}}
    @auth
    <a href="{{action('Admin\AuthorController@create')}}">Create Author</a>
    <a href="{{action('Admin\PublisherController@create')}}">Create Publisher</a>
    <a href="{{action('Admin\BookshopController@create')}}">Create Bookshop</a>
    <form action="{{ route('logout') }}" method="post">
         @csrf
         <button>Logout</button>
    </form>
    @endauth

    {{-- admin only --}}
    @if (Gate::allows('admin'))
        <a>ADMIN PANEL</a>
    @endif

    @can('admin')
    <a href="{{ action("Admin\ReviewController@index") }}">Reviews list</a>
    @endcan


    {{-- if not loged in display the login button--}}
    @guest
    <a href="/login">Login</a>
    @endguest
</nav>