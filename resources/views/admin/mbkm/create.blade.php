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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">MENU TAMBAH /</span> SUPPORTING COURSE </h4>

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">TAMBAH MBKM</h5>
                    </div>
                    <div class="card-body">
                      <form action="{{ route('mbkm.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="mbkm_name">NAMA MBKM</label>
                          <div class="col-sm-10">
                            <input type="text"
                            class="form-control 
                            @error('mbkm_name') is-invalid @enderror" 
                            id="mbkm_name" 
                            name="mbkm_name" 
                            value="{{ old('mbkm_name') }}" 
                            required
                            />
                            @error('mbkm_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="periode_begin">PERIODE MULAI</label>
                            <div class="col-sm-10">
                              <input type="date"
                              class="form-control @error('periode_begin') is-invalid @enderror"
                              id="periode_begin"
                              name="periode_begin"
                              value="{{ old('periode_begin') }}"
                              />
                              @error('periode_begin')
                              <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="periode_end">PERIODE AKHIR</label>
                            <div class="col-sm-10">
                              <input type="date"
                              class="form-control @error('periode_end') is-invalid @enderror"
                              id="periode_end"
                              name="periode_end"
                              value="{{ old('periode_end') }}"
                              />
                              @error('periode_end')
                              <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="positions">LOWONGAN POSISI</label>
                            <div class="col-sm-10">
                              <textarea
                              class="form-control 
                              @error('positions') is-invalid @enderror" 
                              id="positions" 
                              name="positions" 
                              required
                              >{{ old('positions') }}</textarea>
                            </div>
                            @error('positions')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <input type="hidden" name="excerpt" value="{{ 'positions' }}">
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="benefit">BENEFIT</label>
                            <div class="col-sm-10">
                              <textarea
                              class="form-control 
                              @error('benefit') is-invalid @enderror" 
                              id="benefit" 
                              name="benefit" 
                              required
                              >{{ old('benefit') }}</textarea>
                            </div>
                            @error('benefit')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="requirements">REQUIREMENTS</label>
                            <div class="col-sm-10">
                              <textarea
                              class="form-control 
                              @error('requirements') is-invalid @enderror" 
                              id="requirements" 
                              name="requirements" 
                              required
                              >{{ old('requirements') }}</textarea>
                            </div>
                            @error('requirements')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">ILUSTRASI</label>
                            <div class="col-sm-10">
                                <input class="form-control"
                                type="file" 
                                id="image" 
                                name="image" 
                                onchange="previewImage()"
                                />
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
                            value="{{ old('slug') }}"
                            required
                            />
                            @error('slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>

                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
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
                @include('layouts.preview')
@endsection