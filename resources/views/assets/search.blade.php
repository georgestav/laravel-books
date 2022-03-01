<div class="search__container" style="margin: 1rem 0">
<form action="{{action('Admin\AuthorController@search')}}" method="post">
    @csrf
    <input type="text" name="search_term" placeholder="Search author">
    <input type="submit" value="Search">
</form>
</div>