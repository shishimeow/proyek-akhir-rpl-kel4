<div class="stars">
    <input type="radio" id="starA" class="rate" name="rate" value="1" {{ $course == 1 ? 'checked' : '' }}/>
    <label for="starA"><i class="fa-solid fa-star {{ $course >= 1 ? 'active' : '' }}"></i></label>
    <input type="radio" id="starB" class="rate" name="rate" value="2" {{ $course == 2 ? 'checked' : '' }}/>
    <label for="starB"><i class="fa-solid fa-star {{ $course >= 2 ? 'active' : '' }}"></i></label>
    <input type="radio" id="starC" class="rate" name="rate" value="3" {{ $course == 3 ? 'checked' : '' }}/>
    <label for="starC"><i class="fa-solid fa-star {{ $course >= 3 ? 'active' : '' }}"></i></label>
    <input type="radio" id="starD" class="rate" name="rate" value="4" {{ $course == 4 ? 'checked' : '' }}/>
    <label for="starD"><i class="fa-solid fa-star {{ $course >= 4 ? 'active' : '' }}"></i></label>
    <input type="radio" id="starE" class="rate" name="rate" value="5" {{ $course == 5 ? 'checked' : '' }}/>
    <label for="starE"><i class="fa-solid fa-star {{ $course >= 5 ? 'active' : '' }}"></i></label>
</div>