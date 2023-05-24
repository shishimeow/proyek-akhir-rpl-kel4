<div class="row">
    <div class="col">
        <div class="rate">
            <input type="radio" id="editstar5{{ $count }}" class="rate" name="rating" value="5" {{ $course == 5 ? 'checked' : '' }}/>
            <label for="editstar5{{ $count }}" title="text">5 stars</label>
            <input type="radio" id="editstar4{{ $count }}" class="rate" name="rating" value="4" {{ $course == 4 ? 'checked' : '' }}/>
            <label for="editstar4{{ $count }}" title="text">4 stars</label>
            <input type="radio" id="editstar3{{ $count }}" class="rate" name="rating" value="3" {{ $course == 3 ? 'checked' : '' }}/>
            <label for="editstar3{{ $count }}" title="text">3 stars</label>
            <input type="radio" id="editstar2{{ $count }}" class="rate" name="rating" value="2" {{ $course == 2 ? 'checked' : '' }}/>
            <label for="editstar2{{ $count }}" title="text">2 stars</label>
            <input type="radio" id="editstar1{{ $count }}" class="rate" name="rating" value="1" {{ $course == 1 ? 'checked' : '' }}/>
            <label for="editstar1{{ $count }}" title="text">1 star</label>
        </div>
    </div>
</div>