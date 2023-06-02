<a data-bs-toggle="collapse" href="#comment{{$loop->index}}" aria-expanded="false" aria-controls="comment{{$loop->index}}">Reply</a>
  <form class="collapse multi-collapse" action="{{ route('comment.add') }}" method="POST" id="comment{{$loop->index}}">
  @csrf
  <input type="hidden" name="rev_id" value="{{ $review->id }}">
  <input type="hidden" name="user_id" value="{{ $review->user_id }}">
  <input type="hidden" name="type" value="{{ $type }}">
  <div class="col-12">
    <textarea class="col-8 d-flex" rows="5" name="comment" id="comment" wrap="hard"></textarea>
  </div>
  <button type="button" class="btn btn-primary" name="action" onclick="cancelFormComment({{ $loop->index }})">cancel</button>
  <button type="submit" class="btn btn-primary" name="action" value="reply">reply</button>
  </form>

<a class="comment__card-footer" data-bs-toggle="collapse" href="#multiCollapseExample{{$loop->index}}" role="button" aria-expanded="false" aria-controls="multiCollapseExample{{$loop->index}}">
  @if( $review->comments()->where('rev_id', $review->id)->whereNull('parent_id')->count() > 0)
      {{ $review->comments()->where('rev_id', $review->id)->whereNull('parent_id')->count() }} Reply
  @else Reply
  @endif
</a>

<div class="collapse multi-collapse" id="multiCollapseExample{{$loop->index}}">
  <div class="card card-body">
      {{-- @include('partials.reply', ['comments' => $review->comments]) --}}
      @php $comments = $review->comments @endphp
      @foreach($comments as $comment)
      <div class="display-comment">
          <div class="card card-body col-12">
              <div class="col-12">
                <strong>{{ $comment->user->username }}</strong>
                {{ \Carbon\Carbon::parse($comment->created_at)->locale('id_ID')->isoFormat('D MMMM YYYY') }}
                <p>{{ $comment->comment }}</p>
              </div>
              
              @if($comment->user_id == auth()->user()->id)
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" data-bs-toggle="collapse" href="#editComment{{ $comment->id }}"
                    ><i class="bx bx-edit-alt me-2"></i> Edit</a
                  >
                  <a class="dropdown-item" href="#" onclick="deleteComment({{ $comment->id }})"
                    ><i class="bx bx-trash me-2"></i> Delete</a
                  >
                </div>
              </div>

              <form class="collapse multi-collapse" action="{{ route('update.add') }}" method="POST" id="editComment{{ $comment->id }}">
                  @method('put')
                  @csrf
                  <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                  <input type="hidden" name="type" value="{{ $comment->type }}">
                  <div class="col-12">
                      <textarea class="col-8 d-flex" rows="5" name="comment" id="comment" wrap="hard" required>{{ $comment->comment }}</textarea>
                  </div>
                  <button type="button" class="btn btn-primary" name="action" onclick="cancelFormReply({{ $comment->id }})">cancel</button>
                  <button type="submit" class="btn btn-primary" name="action" value="save">save</button>
              </form>
              <form action="{{ route('delete.add') }}" method="POST" id="delCom{{ $comment->id }}">
                  @method('delete')
                  @csrf
                  <input type="hidden" name="comment_id" value="{{ $comment->id }}">
              </form>
              @endif

              <a data-bs-toggle="collapse" href="#replyComment{{$loop->index}}" aria-expanded="false" aria-controls="replyComment{{$loop->index}}">Reply</a>
              <form class="collapse multi-collapse" action="{{ route('reply.add') }}" method="POST" id="replyComment{{$loop->index}}">
                  @csrf
                  <input type="hidden" name="rev_id" value="{{ $comment->id }}">
                  <input type="hidden" name="user_id" value="{{ $comment->user_id }}">
                  <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                  <input type="hidden" name="type" value="{{ $comment->type }}">
                  <div class="col-12">
                  <textarea class="col-8 d-flex" rows="5" name="comment" id="comment" wrap="hard"></textarea>
                  </div>
                  <button type="button" class="btn btn-primary" name="action" onclick="cancelReplyComment({{ $loop->index }})">cancel</button>
                  <button type="submit" class="btn btn-primary" name="action" value="reply">reply</button>
              </form>

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
</div>

<script>
          function cancelFormComment(formIndex) {
            var form = document.getElementById('comment' + formIndex);
            form.classList.remove('show');
          }

          function deleteComment(formIndex) {
              event.preventDefault();

              var form = document.getElementById('delCom' + formIndex);
              form.submit();
          }

          function cancelFormReply(formIndex) {
            var form = document.getElementById('editComment' + formIndex);
            form.classList.remove('show');
          }

          function cancelReplyComment(formIndex) {
            var form = document.getElementById('replyComment' + formIndex);
            form.classList.remove('show');
          }
</script>

