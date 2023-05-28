@foreach($comments as $comment)
<div class="display-comment">
    <div class="card card-body">
        <strong>{{ $comment->user->username }}</strong>
        {{ \Carbon\Carbon::parse($comment->created_at)->locale('id_ID')->isoFormat('D MMMM YYYY') }}
        <a data-bs-toggle="collapse" href="#reply{{$loop->index}}" role="button" aria-expanded="false" aria-controls="reply{{$loop->index}}">
            @if( $comment->where('parent_id', $comment->id)->count() > 0)
            {{ $comment->where('parent_id', $comment->id)->count() }} Reply
            @else Reply
            @endif
        </a>

        @if($comment->user_id == auth()->user()->id)
        <a data-bs-toggle="collapse" href="#editreply{{$loop->index}}" aria-expanded="false" aria-controls="editreply{{$loop->index}}">Edit</a>
        <form class="collapse multi-collapse" action="{{ route('update.add') }}" method="POST" id="editreply{{ $loop->index }}">
            @method('put')
            @csrf
            <input type="hidden" name="comment_id" value="{{ $comment->id }}">
            <input type="hidden" name="type" value="{{ $comment->type }}">
            <div class="col-12">
                <textarea class="col-8 d-flex" rows="5" name="comment" id="comment" wrap="hard" required>{{ $comment->comment }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="action" value="cancel">cancel</button>
            <button type="submit" class="btn btn-primary" name="action" value="save">save</button>
        </form>
        <form action="{{ route('delete.add') }}" method="POST">
            @method('delete')
            @csrf
            <input type="hidden" name="comment_id" value="{{ $comment->id }}">
            <button type="submit" class="btn btn-primary" name="action" value="delete">delete</button>
        </form>
        @endif

        <p>{{ $comment->comment }}</p>
        <div class="collapse multi-collapse" id="reply{{$loop->index}}">
            <div class="card card-body">
                <form action="{{ route('reply.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="rev_id" value="{{ $comment->rev_id }}">
                    <input type="hidden" name="user_id" value="{{ $comment->user_id }}">
                    <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                    <input type="hidden" name="type" value="{{ $comment->type }}">
                    <div class="col-12">
                        <textarea class="col-8 d-flex" rows="5" name="comment" id="comment" wrap="hard"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="action" value="cancel">cancel</button>
                    <button type="submit" class="btn btn-primary" name="action" value="reply">reply</button>
                </form>
            </div>
            <br>
        </div>

        @include('partials.reply', ['comments' => $comment->replies])

    </div>
    <br>
</div>


@endforeach