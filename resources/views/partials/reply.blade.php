  <div class="collapse multi-collapse" id="replyCollapse{{$comment->id}}">
    @foreach($comments as $comment)
    <div class="display-comment">
        <div class="card card-body">
            <strong>{{ $comment->user->username }}</strong>
            {{ \Carbon\Carbon::parse($comment->created_at)->locale('id_ID')->isoFormat('D MMMM YYYY') }}
    
            <p>{{ $comment->comment }}</p>
    
            @if($comment->user_id == auth()->user()->id)
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                <i class="bx bx-dots-vertical-rounded"></i>
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" data-bs-toggle="collapse" href="#replyReply{{ $comment->id }}"
                  ><i class="bx bx-edit-alt me-2"></i> Edit</a
                >
                <a class="dropdown-item" href="#" onclick="deleteReply({{ $comment->id }})"
                  ><i class="bx bx-trash me-2"></i> Delete</a
                >
              </div>
            </div>
            @endif


            <a data-bs-toggle="collapse" href="#replyReply{{ $comment->id }}" role="button" aria-expanded="false" aria-controls="replyReply{{$comment->id}}">Reply</a>

            @if($comment->user_id == auth()->user()->id)
            <form class="collapse multi-collapse" action="{{ route('update.add') }}" method="POST" id="editreply{{ $loop->index }}-{{ $comment->id }}">
                @method('put')
                @csrf
                <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                <input type="hidden" name="type" value="{{ $comment->type }}">
                <div class="col-12">
                    <textarea class="col-8 d-flex" rows="5" name="comment" id="comment" wrap="hard" required>{{ $comment->comment }}</textarea>
                </div>
                <button type="button" class="btn btn-primary" name="action" onclick="cancelEditReply({{ $comment->id }})">cancel</button>
                <button type="submit" class="btn btn-primary" name="action" value="save">save</button>
            </form>
            <form action="{{ route('delete.add') }}" method="POST" id="delReply{{ $comment->id }}">
                @method('delete')
                @csrf
                <input type="hidden" name="comment_id" value="{{ $comment->id }}">
            </form>
            @endif
    
            <div class="collapse multi-collapse" id="replyReply{{ $comment->id }}">
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
                        <button type="button" class="btn btn-primary" name="action" onclick="cancelReplyReply({{ $comment->id }})">cancel</button>
                        <button type="submit" class="btn btn-primary" name="action" value="reply">reply</button>
                    </form>
                </div>
                <br>
            </div>
    
            <a class="comment__card-footer" data-bs-toggle="collapse" href="#replyCollapse{{$comment->id}}" role="button" aria-expanded="false" aria-controls="replyCollapse{{$comment->id}}">
                @if( $comment->where('parent_id', $comment->id)->count() > 0)
                {{ $comment->where('parent_id', $comment->id)->count() }} Reply
                @else Reply
                @endif
            </a>

            @include('partials.reply', ['comments' => $comment->replies])
    
        </div>
        <br>
    </div>
    
    
    @endforeach
  </div>


  <script>
        function cancelEditReply(formIndex) {
            var form = document.getElementById('editreply' + formIndex);
            form.classList.remove('show');
        }

        function cancelReplyReply(formIndex) {
            var form = document.getElementById('replyReply' + formIndex);
            form.classList.remove('show');
        }

        function deleteReply(formIndex) {
            event.preventDefault();

            var form = document.getElementById('delReply' + formIndex);
            form.submit();
        }
  </script>