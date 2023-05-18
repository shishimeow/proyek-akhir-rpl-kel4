@extends('layouts.adminmain')

@section('container')
    <h1>{{ $title }}</h1>
    <div class="main">
        <form action="/admin/mbkm" method="POST" class="row justify-content-center g-3" enctype="multipart/form-data">
            @csrf
            <div class="col-12">
                <label for="mbkm_name" class="form-label">Nama MBKM</label>
                <input type="text" name="mbkm_name" class="form-control @error('mbkm_name') is-invalid @enderror" id="mbkm_name" value="{{ old('mbkm_name') }}" required>
                @error('mbkm_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12">
                <label for="periode_begin" class="form-label">Tanggal Mulai</label>
                <input type="date" id="periode_begin" name="periode_begin" class="form-control @error('periode_begin') is-invalid @enderror" value="{{ old('periode_begin') }}">
                @error('periode_begin')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <br>
                <label for="periode_end" class="form-label">Tanggal Akhir</label>
                <input type="date" id="periode_end" name="periode_end" class="form-control @error('periode_end') is-invalid @enderror" value="{{ old('periode_end') }}">
                @error('periode_end')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12">
                <label for="positions" class="form-label">Lowongan Posisi</label>
                <textarea class="col-8 d-flex @error('periode_end') is-invalid @enderror" rows="5" name="positions" id="positions" wrap="hard" required>{{{  old('positions')  }}}</textarea>
                @error('positions')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <input type="hidden" name="excerpt" value="{{ 'positions' }}">
            </div>

            <div class="col-12">
                <label for="benefit" class="form-label">Benefit Program</label>
                <textarea class="col-8 d-flex @error('benefit') is-invalid @enderror" rows="5" name="benefit" id="benefit" wrap="hard" required>{{{  old('benefit')  }}}</textarea>
                @error('benefit')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12">
                <label for="requirements" class="form-label">Requirements</label>
                <textarea class="col-8 d-flex @error('requirements') is-invalid @enderror" rows="5" name="requirements" id="requirements" wrap="hard" required>{{{  old('requirements')  }}}</textarea>
                @error('requirements')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
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
        const title = document.querySelector('#mbkm_name');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function(){
            fetch('/admin/sc/checkSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    </script>
@endsection