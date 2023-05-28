<div class="comment__card-footer">
    <div>Likes 123</div>
    <div>Dislikes 23</div>
    <div class="show-replies">Reply 2</div>
</div>

<div
class="comment__container"
dataset="first-comment"
id="first-reply">
    <div class="comment__card">
        <form action="{{ route('comment.add') }}" method="POST">
            @csrf
            <input type="hidden" name="rev_id" value="{{ $review->id }}">
            <input type="hidden" name="user_id" value="{{ $review->user_id }}">
            <input type="hidden" name="type" value="{{ $type }}">
            <p>
                <textarea class="col-8 d-flex" rows="5" name="comment" id="comment" wrap="hard"></textarea>
            </p>
            <button type="submit" class="btn btn-primary" name="action" value="cancel">cancel</button>
            <button type="submit" class="btn btn-primary" name="action" value="reply">reply</button>
        </form>
        <br><br>
        @include('partials.reply', ['comments' => $review->comments])
    </div>
</div>
<div
  class="comment__container"
  dataset="first-reply"
  id="first-first-reply"
>
  <div class="comment__card">
    <h3 class="comment__title">The first reply to the first reply</h3>
    <p>
      Lorem ipsum dolor, sit amet consectetur adipisicing elit.
      Voluptatum eaque itaque sit tempora officiis, quisquam atque?
      Impedit dignissimos error laudantium!
    </p>
    <div class="comment__card-footer">
      <div>Likes 123</div>
      <div>Dislikes 23</div>
      <div class="show-replies">Reply 1</div>
    </div>
  </div>

</div>
</div>

</div>
</div>