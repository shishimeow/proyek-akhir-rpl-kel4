@extends('layouts.adminmain')

@section('container')
    {{ $title }} - {{ $course->courses_id }} {{ $course->courses_name }}

    <div class="main">
        <form action="/admin/sc/{{ $course->courses_id }}" method="POST" class="row justify-content-center g-3" enctype="multipart/form-data">
            @csrf
            @method('put')
            <input type="hidden" name="oldImage" value="{{ $course->picture }}">

            <div class="col-12">
                <label for="courseid" class="form-label">ID Course</label>
                <input type="text" name="courses_id" class="form-control @error('courses_id') is-invalid @enderror" id="courseid" value="{{ $course->courses_id }}" required>
            </div>
            
            <div class="col-12">
                <label for="coursename" class="form-label">Nama Course</label>
                <input type="text" name="courses_name" class="form-control @error('courses_name') is-invalid @enderror" id="coursename" value="{{ $course->courses_name }}" required>
            </div>
            
            <div class="col-12">
              <label for="facultyid" class="form-label">Fakultas</label>
              <select class="form-select" name="faculty_id">
                <option selected>Pilih fakultas</option>
                @foreach($faculties as $faculty)
                <option value="{{ $faculty->id }}">{{ $faculty->faculty_name }}</option>
                @endforeach
              </select>
            </div>
            
            <div class="col-12">
                <label for="sks" class="form-label">SKS</label>
                <input type="text" name="course_credits" class="form-control @error('course_credits') is-invalid @enderror" id="sks" value="{{ $course->course_credits }}" placeholder="ex. 2-1" required>
            </div>
            
            <div class="col-12">
                <label for="date" class="form-label">Hari Course</label>
                <input type="text" name="date" class="form-control @error('date') is-invalid @enderror" id="date" value="{{ $course->date }}" placeholder="ex. Senin, 00:00 WIB" required>
            </div>
            
            <div class="col-12">
                <label for="desc" class="form-label">Deskripsi Course</label>
                <textarea class="col-8 d-flex" rows="5" name="desc" id="desc" wrap="hard" required>{{ $course->desc }}</textarea>
            </div>
            
            <div class="mb-3">
                <label for="picture" class="form-label">Ilustrasi Course</label>
                @if($course->picture)
                    <img src="{{ asset('storage/'. $course->picture) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                @else
                    <img class="img-preview img-fluis mb-3 col-sm-5">
                @endif

                
                <input class="form-control" type="file" id="image" name="image">
            </div>
            
            <div class="col-12">
                <label for="slug" class="form-label">Link Course</label>
                <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug" value="{{ $course->slug }}" required>
            </div>
            
            <div class="col-12">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>


@endsection