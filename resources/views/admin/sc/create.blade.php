@extends('layouts.adminmain')

@section('container')
    <h1>{{ $title }}</h1>
    <div class="main">
        <form action="/admin/sc" method="POST" class="row justify-content-center g-3" enctype="multipart/form-data">
            @csrf
            <div class="col-12">
                <label for="courseid" class="form-label">Id Course</label>
                <input type="text" name="courses_id" class="form-control @error('courses_id') is-invalid @enderror" id="courseid" value="{{ old('courses_id') }}" required>
                @error('courses_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12">
                <label for="courses_name" class="form-label">Nama Course</label>
                <input type="text" name="courses_name" class="form-control @error('courses_name') is-invalid @enderror" id="courses_name" value="{{ old('courses_name') }}" required>
            </div>
            <div class="col-12">
              <label for="faucltyid" class="form-label">Fakultas</label>
              <select class="form-select" name="faculty_id">
                <option selected>Pilih fakultas</option>
                @foreach($faculties as $faculty)
                <option value="{{ $faculty->id }}">{{ $faculty->faculty_name }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-12">
                <label for="sks" class="form-label">SKS</label>
                <input type="text" name="course_credits" class="form-control @error('course_credits') is-invalid @enderror" id="sks" value="{{ old('course_credits') }}" placeholder="ex. 2-1" required>
            </div>
            <div class="col-12">
                <label for="date" class="form-label">Hari Course</label>
                <input type="text" name="date" class="form-control @error('date') is-invalid @enderror" id="date" value="{{ old('date') }}" placeholder="ex. Senin, 00:00 WIB" required>
            </div>
            <div class="col-12">
                <label for="desc" class="form-label">Deskripsi Course</label>
                <textarea class="col-8 d-flex" rows="5" name="desc" id="desc" wrap="hard" required>{{{  old('desc')  }}}</textarea>
            </div>
            <div class="mb-3">
                <label for="picture" class="form-label">Ilustrasi Course</label>
                <input class="form-control" type="file" id="image" name="image">
            </div>
            <div class="col-12">
                <label for="slug" class="form-label">Link Course</label>
                <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug" required>
                @error('slug')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>

    <script>
        const title = document.querySelector('#courses_name');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function(){
            fetch('/admin/sc/checkSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    </script>
@endsection