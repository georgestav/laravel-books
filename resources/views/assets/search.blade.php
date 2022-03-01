<div class="search__container" style="margin: 1rem 0">
<form action="{{action('Admin\AuthorController@search')}}" method="post">
    @csrf
    <input type="text" name="search_term" placeholder="Search" disabled>
    <input type="submit" value="Search" disabled>
</form>
</div>