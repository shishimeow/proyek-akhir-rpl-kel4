@extends('layouts.main')

@section('container')
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

    <h1>{{ $support_course->courses_id }} - {{ $support_course->courses_name }}</h1>

    <br><br>
    <h3>Bobot Satuan Kredit Semester (SKS)</h3>
    {{ $support_course->course_credits }}
    <br><br>

    <h3>Deskripsi Mata Kuliah</h3>
    {{ $support_course->desc }}
    <br><br>

    @foreach(explode(',',$support_course->desc) as $row)
    <li>{{ $row }}</li>
    @endforeach


    <br>
    <h3>Rating</h3>
    <div>
        <p>Rating: {{ $reviews->avg('rating') }}</p>
        <p>Banyak review: {{ $reviews->count() }} review</p>
        @for($i=0; $i<5; $i++)
            <p>Banyak yang rating {{ $i + 1 }}: {{ $reviews->where('rating', $i + 1)->count() / $reviews->count() * 100}}%</p>
        @endfor
    </div>
    
    <br>
    <h3>Tambah Review</h3>
    
    <div>
        {{ auth()->user()->username }}
        <form action="" method="POST">
            @csrf

            @include('partials.rating', ['course' => $support_course])
            
            <input type="hidden" name="courses_id" value="{{ $support_course->id }}">
            <div class="col-12">
                <textarea class="col-8 d-flex" rows="5" name="rev_sc" id="rev_sc" wrap="hard" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="action" value="cancel">cancel</button>
            <button type="submit" class="btn btn-primary" name="action" value="add">add</button>
        </form>
    </div>

    <br>
    <h3>Learner Review</h3>
            @foreach ($reviews->sortByDesc('created_at') as $review)
            <div class="card card-body col-12">
                <div class="col-12">
                    <strong>{{ $review->users->username }}</strong>
                    {{ \Carbon\Carbon::parse($review->created_at)->locale('id_ID')->isoFormat('D MMMM YYYY') }}
                </div>

                {{-- kerjaan front end nampilin ratingny --}}
                <div class="form-group row">
                    Rating: {{ $review->rating }}
                </div>

                <div class="col-12">
                    {{ $review->rev_sc }}
                </div>

                @include('partials.comment', ['review' => $review, 'type' => 'sc'])

                @if($review->user_id == auth()->user()->id)
                <a data-bs-toggle="collapse" href="#edit{{$loop->index}}" aria-expanded="false" aria-controls="edit{{$loop->index}}">Edit</a>
                <form class="collapse multi-collapse" action="{{ route('scupdate.add') }}" method="POST" id="edit{{ $loop->index }}">
                    @method('put')
                    @csrf
                    <input type="hidden" name="rev_id" value="{{ $review->id }}">
                    <div class="col-12">
                        <textarea class="col-8 d-flex" rows="5" name="rev_sc" id="rev_sc" wrap="hard" required>{{ $review->rev_sc }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="action" value="cancel">cancel</button>
                    <button type="submit" class="btn btn-primary" name="action" value="save">save</button>
                </form>
                <form action="{{ route('scdelete.add') }}" method="POST">
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