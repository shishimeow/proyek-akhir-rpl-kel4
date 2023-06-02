@extends('layouts.adminmain')

@section('container')
    <h1>{{ $title }}</h1>
    <div class="main">
        {{-- <form action="/admin/faculty/{{ $faculty->slug }}" method="POST" class="row justify-content-center g-3"> --}}
        <form action="{{ route('faculty.update', $faculty->slug) }}" method="POST" class="row justify-content-center g-3">
            @csrf
            @method('put')
            <div class="col-12">
                <label for="faculty_name" class="form-label">Nama Fakultas</label>
                <input type="text" name="faculty_name" class="form-control @error('faculty_name') is-invalid @enderror" id="faculty_name" value="{{ old('faculty_name', $faculty->faculty_name) }}" required>
                @error('faculty_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12">
                <label for="slug" class="form-label">Link Fakultas</label>
                <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug" value="{{ old('slug', $faculty->slug) }}" required>
                @error('slug')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>

    <script>
        const title = document.querySelector('#faculty_name');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function(){
            fetch('/admin/sc/checkSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    </script>
@endsection