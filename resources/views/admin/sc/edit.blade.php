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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">MENU EDIT / </span><span style="text-transform: uppercase;">{{ $course->courses_id }} - {{ $course->courses_name }} </span></h4>

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">EDIT SUPPORTING COURSE</h5>
                    </div>
                    <div class="card-body">
                      <form action="{{ route('sc.update', $course->slug) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="courses_id">ID COURSE</label>
                          <div class="col-sm-10">
                            <input type="text"
                            class="form-control 
                            @error('courses_id') is-invalid @enderror" 
                            id="courses_id" 
                            name="courses_id" 
                            value="{{ old('courses_id', $course->courses_id) }}" 
                            required
                            />
                            @error('courses_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="courses_name">NAME</label>
                          <div class="col-sm-10">
                            <input type="text"
                            class="form-control 
                            @error('courses_name') is-invalid @enderror" 
                            id="courses_name" 
                            name="courses_name" 
                            value="{{ old('courses_name', $course->courses_name) }}" 
                            required
                            />
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">FAKULTAS</label>
                          <div class="col-sm-10">
                            <select class="form-select" name="faculty_id">
                                <option value="option_select" disabled selected>Pilih fakultas</option>
                                @foreach($faculties as $faculty)
                                <option value="{{ $faculty->id }}" {{ $faculty->id == $course->faculty_id ? 'selected' : '' }}>{{ $faculty->faculty_name }}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">BOBOT SKS</label>
                          <div class="col-sm-10">
                            <input type="text"
                            class="form-control 
                            @error('course_credits') is-invalid @enderror" 
                            id="basic-default-name" 
                            name="course_credits" 
                            value="{{ old('course_credits', $course->course_credits) }}"
                            placeholder="ex. 2-1" 
                            required
                            />
                          </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">JADWAL HARI</label>
                            <div class="col-sm-10">
                              <input type="text"
                              class="form-control 
                              @error('date') is-invalid @enderror" 
                              id="basic-default-name" 
                              name="date" 
                              value="{{ old('date', $course->date) }}"
                              placeholder="ex. Senin, 12:00 WIB" 
                              required
                              />
                            </div>
                        </div>

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-message">DESKRIPSI</label>
                          <div class="col-sm-10">
                            <textarea
                              id="basic-default-message"
                              class="form-control"
                              name="desc"
                              aria-describedby="basic-icon-default-message2"
                              required
                            >{{{  old('desc', $course->desc)  }}}</textarea>
                          </div>
                        </div>

                        <label class="col-sm-2 col-form-label" for="basic-default-name">ILUSTRASI</label>
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            @if($course->picture)
                            <input type="hidden" name="oldImage" value="{{ $course->picture }}">
                            <img src="{{ asset('storage/'. $course->picture) }}" alt="user-avatar"
                                class="d-block rounded"
                                height="100"
                                width="100"
                                id="image"
                            >
                            @else
                            <img
                                class="d-block rounded"
                                height="100"
                                width="100"
                                id="image"
                            >
                            @endif
    
    
                                <div class="button-wrapper">
                               <div class="row mb-3">
                            <div class="col-sm-10">
                                <input class="form-control"
                                type="file" 
                                id="image" 
                                name="image" 
                                onchange="previewImage()"
                                />
                            </div>
                        </div>
                              
    
                              
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
                            value="{{ old('slug', $course->slug) }}"
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
                    const coursesId = document.querySelector('#courses_id');
                    const coursesName = document.querySelector('#courses_name');
                    const title = document.querySelectorAll('#courses_id, #courses_name');
                    const slug = document.querySelector('#slug');
                
                    for (let i = 0; i < title.length; i++) {
                        title[i].addEventListener('change', function(){
                            fetch('/admin/sc/checkSlug?title=' + coursesId.value + '-' + coursesName.value)
                                .then(response => response.json())
                                .then(data => slug.value = data.slug)
                        });
                    }
                </script>
                @include('layouts.preview')
@endsection