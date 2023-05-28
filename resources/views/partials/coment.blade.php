<a data-bs-toggle="collapse" href="#multiCollapseExample{{$loop->index}}" role="button" aria-expanded="false" aria-controls="multiCollapseExample{{$loop->index}}">
    @if( $review->comments()->where('rev_id', $review->id)->whereNull('parent_id')->count() > 0)
        {{ $review->comments()->where('rev_id', $review->id)->whereNull('parent_id')->count() }} Reply
    @else Reply
    @endif
</a>

<div class="collapse multi-collapse" id="multiCollapseExample{{$loop->index}}">
    <div class="card card-body">
        <form action="{{ route('comment.add') }}" method="POST">
            @csrf
            <input type="hidden" name="rev_id" value="{{ $review->id }}">
            <input type="hidden" name="user_id" value="{{ $review->user_id }}">
            <input type="hidden" name="type" value="{{ $type }}">
            <div class="col-12">
                <textarea class="col-8 d-flex" rows="5" name="comment" id="comment" wrap="hard"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="action" value="cancel">cancel</button>
            <button type="submit" class="btn btn-primary" name="action" value="reply">reply</button>
        </form>
        <br><br>
        @include('partials.reply', ['comments' => $review->comments])
    </div>
</div>
