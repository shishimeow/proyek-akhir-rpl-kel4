@extends('layouts.main')

@section ('container')
    @if(session()->has('success'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session()->has('delete'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session('delete') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @include('partials.notif')
    
    <h1> {{ $title }}</h1>
    <br><br>
    <h4>Periode pendaftaran:</h4>
    {{ \Carbon\Carbon::parse($mbkm->periode_begin)->locale('id_ID')->isoFormat('D MMMM YYYY') }} - {{ \Carbon\Carbon::parse($mbkm->periode_end)->locale('id_ID')->isoFormat('D MMMM YYYY') }}
    <br><br>
    <h3>Benefit</h3>
        @foreach(explode('.',$mbkm->benefit) as $row)
        <li>{{ $row }}</li>
        @endforeach
    <br><br>
    <h3>Position</h3>
        @foreach(explode(',',$mbkm->positions) as $row)
        <li>{{ $row }}</li>
        @endforeach
    <br><br>
    <h3>Requirements</h3>
        @foreach(explode('.',$mbkm->requirements) as $row)
        <li>{{ $row }}</li>
        @endforeach
    <br><br>

    <h3>Rating</h3>
    <div>
        <p>Rating: {{ $mbkm->rating }}</p>
        <p>Banyak review: {{ $reviews->count() }} review</p>
        @for($i=0; $i<5; $i++)
            @if($reviews->count() == 0)
                <p>Banyak yang rating {{ $i + 1 }}: {{ $reviews->where('rating', $i + 1)->count() / 1 * 100}}%</p>
            @else
                <p>Banyak yang rating {{ $i + 1 }}: {{ $reviews->where('rating', $i + 1)->count() / $reviews->count() * 100}}%</p>
            @endif
        @endfor
    </div>
    <br><br>

    <h3>Tambah Review</h3>
    {{ auth()->user()->username }}
    <form action="/mbkm/{{ $mbkm->slug }}" method="POST">
        @csrf

        @include('partials.rating', ['course' => $mbkm])

        <input type="hidden" name="mbkm_id" value="{{ $mbkm->id }}">
        <div class="col-12">
            <textarea class="col-8 d-flex" rows="5" name="rev_mbkm" id="rev_mbkm" wrap="hard" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="action" value="cancel">cancel</button>
        <button type="submit" class="btn btn-primary" name="action" value="add">add</button>
    </form>

    <h3>Learner Review</h3>

    @foreach ($reviews as $review)
    <div class="card card-body col-12">
    <div class="col-12">
        <strong>{{ $review->users->username }}</strong>
        {{ \Carbon\Carbon::parse($review->created_at)->locale('id_ID')->isoFormat('D MMMM YYYY') }}
    </div>

    <div class="form-group row">
        Rating: {{ $review->rating }}
    </div>

    <div class="col-12">
        {{ $review->rev_mbkm }}
    </div>

    @include('partials.comment', ['review' => $review, 'type' => 'mbkm'])

    @if($review->user_id == auth()->user()->id)
    <a data-bs-toggle="collapse" href="#edit{{$loop->index}}" aria-expanded="false" aria-controls="edit{{$loop->index}}">Edit</a>
    <form class="collapse multi-collapse" action="{{ route('mupdate.add') }}" method="POST" id="edit{{ $loop->index }}">
        @method('put')
        @csrf

        @include('partials.editrate', ['course' => $review->rating, 'count' => $loop->index])

        <input type="hidden" name="rev_id" value="{{ $review->id }}">
        <div class="col-12">
            <textarea class="col-8 d-flex" rows="5" name="rev_mbkm" id="rev_mbkm" wrap="hard" required>{{ $review->rev_mbkm }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="action" value="cancel">cancel</button>
        <button type="submit" class="btn btn-primary" name="action" value="save">save</button>
    </form>

    <form action="{{ route('mdelete.add') }}" method="POST">
        @method('delete')
        @csrf
        <input type="hidden" name="rev_id" value="{{ $review->id }}">
        <button type="submit" class="btn btn-primary" name="action" value="delete">delete</button>
    </form>
    @endif
</div>
<br><br>
@endforeach

    
@endsection