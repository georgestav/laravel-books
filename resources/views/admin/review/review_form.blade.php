@auth    
<div class="review__form">
    <h3>Leave your review of book</h3>
    <form action="{{action('Admin\BookController@storeBookReview',['id'=>$book->id])}}" method="post">
        @csrf
        <div>
            <textarea name="text" id="user_review" cols="30" rows="10">{{old('text') ?? null}}</textarea>
        </div>
        <div>
            <input type="submit" value="Submit Review">
        </div>
    </form>
</div>
@endauth

@guest
<h3>You need to Log in to review this book</h3>
@endguest