
@extends('layouts.adminmain')

@section('container')
    <h1>{{ $title }}</h1>
    <div class="main">
        <form action="/admin/sc/{{ $course->slug }}" method="POST" class="row justify-content-center g-3" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="col-12">
                <label for="mbkmname" class="form-label">Nama MBKM</label>
                <input type="text" name="mbkmname" class="form-control @error('mbkmname') is-invalid @enderror" id="mbkmname" value="{{ old('mbkmname', $course->mbkm_name) }}" required>
            </div>

            <div class="col-12">
                <label for="startdate" class="form-label">Tanggal Mulai</label>
                <label for="enddate" class="form-label">Tanggal Akhir</label>
            </div>

            <div class="col-12">
                <label for="positions" class="form-label">Lowongan Posisi</label>
                <textarea class="col-8 d-flex" rows="5" name="positions" id="positions" wrap="hard" required>{{{  old('positions', $course->positions)  }}}</textarea>
            </div>

            <div class="col-12">
                <label for="benefit" class="form-label">Benefit Program</label>
                <textarea class="col-8 d-flex" rows="5" name="benefit" id="benefit" wrap="hard" required>{{{  old('benefit', $course->benefit)  }}}</textarea>
            </div>

            <div class="col-12">
                <label for="requirements" class="form-label">Requirements</label>
                <textarea class="col-8 d-flex" rows="5" name="requirements" id="requirements" wrap="hard" required>{{{  old('requirements', $course->requirements)  }}}</textarea>
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
                <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug" value="{{ old('slug', $course->slug) }}" required>
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
        const title = document.querySelector('#mbkmname');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function(){
            fetch('/admin/sc/checkSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    </script>
@endsection

