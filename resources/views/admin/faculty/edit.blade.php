@extends('layouts.adminmain')

@section('container')

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">

        @include('partials.adminav')

        <!-- Layout container -->
        <div class="layout-page">

          @include('partials.search')

          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">MENU EDIT / </span><span style="text-transform: uppercase;">{{ $faculty->faculty_name}}</span></h4>

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">EDIT FAKULTAS</h5>
                    </div>
                    <div class="card-body">
                      <form action="{{ route('faculty.update', $faculty->slug) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="faculty_name">NAMA FAKULTAS</label>
                          <div class="col-sm-10">
                            <input type="text"
                            class="form-control 
                            @error('faculty_name') is-invalid @enderror" 
                            id="faculty_name" 
                            name="faculty_name" 
                            value="{{ old('faculty_name', $faculty->faculty_name) }}" 
                            required
                            />
                            @error('faculty_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="slug">LINK COURSE</label>
                          <div class="col-sm-10">
                            <input type="text"
                            class="form-control 
                            @error('slug') is-invalid @enderror" 
                            name="slug"
                            id="slug"
                            value="{{ old('slug', $faculty->slug) }}"
                            required
                            />
                            @error('slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>

                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Edit</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
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
                @include('layouts.preview')
@endsection