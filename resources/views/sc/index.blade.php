@extends('layouts/main')

@section('container')
    <h1>{{ $title }}</h1>

    <div class="row">
        <div class="col-md-6">
          <form action="{{ route('searchsc.add') }}">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="dicari ayang" name="search" value="{{ request('search') }}">
              <button class="btn btn-outline-secondary" type="submit">Cari</button>
            </div>
          </form>
        </div>
    </div>
    
    <div class="main">
        <form action="{{ route('filtersc.add') }}" method="POST">
            @csrf
            @foreach ($faculties as $faculty)
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="{{ $faculty->id }}" id="{{ $faculty->faculty_name }}" name="filter[]">
                    <label class="form-check-label" for="{{ $faculty->faculty_name }}">
                        {{ $faculty->faculty_name }}
                    </label>
                </div>
            @endforeach
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        @foreach ($support_courses as $support_course)
        <div class="card" style="width: 18rem;">
            @if($support_course->picture)
                <img src="{{ asset('storage/'. $support_course->picture) }}" class="img-preview img-fluid">
            @else
                <img src="{{ URL::to('/') }}/img/image1.jpg" class="card-img-top" alt="Tampilan SC">
            @endif
            <div class="card-body">
                <h5 class="card-title">{{ $support_course->courses_id }} - {{ $support_course->courses_name }}</h5>
                <p class="card-text">Rating: {{ $support_course->reviewscs->avg('rating') }}</p>
                <a href="/sc/{{ $support_course->slug }}" class="btn btn-primary">Read more</a>
            </div>
        </div>
        @endforeach
    </div>

@endsection