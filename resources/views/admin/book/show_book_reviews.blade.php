<div class="book__reviews">
    <h3>What other people thought of this book</h3>
    <ul>
        @foreach ($reviews as $review)
        <li>{{$review->text}} by user {{$review->user_id}} date: {{$review->created_at}}</li>
            
        @endforeach
    </ul>
</div>