@extends('layouts.scmbkm')

@section('container')

     <!-- Layout wrapper -->
     <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            
         @include('partials.navbar')
  
          <!-- Layout container -->
          <div class="layout-page">

            @include('partials.search')

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              

              <div class="row">
                <div class="col-md-12">
                  <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    
                  </ul>
                  <div class="card mb-4">
                    <form id="formAccountSettings" action="{{ route('profupdate.add') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <h5 class="card-header">Profile Details</h5>
                    <!-- Account -->
                    <div class="card-body">
                      <div class="d-flex align-items-start align-items-sm-center gap-4">
                        @if(auth()->user()->image)
                        <input type="hidden" name="oldImage" value="{{ auth()->user()->image }}">
                        <img src="{{ asset('storage/'. auth()->user()->image) }}" alt="user-avatar"
                            class="d-block rounded"
                            height="100"
                            width="100"
                            id="image"
                        >
                        @else
                        <img src="{{ URL::to('/') }}/img/user.png" alt="user-avatar"
                            class="d-block rounded"
                            height="100"
                            width="100"
                            id="image"
                        >
                        @endif


                            <div class="button-wrapper">
                          <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload new photo</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input
                              name="image"
                              type="file"
                              id="upload"
                              class="account-file-input"
                              hidden
                              accept="image/png, image/jpeg"
                              onchange="previewImage()"
                            />
                          </label>
                          

                          
                        </div>
                      </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">Name</label>
                            <input
                              class="form-control"
                              type="text"
                              id="firstName"
                              name="name"
                              value="{{ auth()->user()->name }}"
                              autofocus
                              required
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="lastName" class="form-label">Username</label>
                            <input
                                class="form-control"
                                type="text"
                                name="username"
                                id="lastName"
                                value="{{ auth()->user()->username }}" 
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input
                              class="form-control"
                              type="text"
                              id="email"
                              name="email"
                              value="{{ auth()->user()->email }}"
                              required
                            />
                          </div>
                          
                          <div class="mb-3 col-md-6">
                            <label for="" class="form-label">Departemen</label>
                            <select id="" class="select2 form-select" name="dept">
                                <option value="all" selected>Pilih fakultas</option>
                                @foreach ($faculties as $faculty)
                                <option value="{{ $faculty->id }}" id="{{ $faculty->faculty_name }}">{{ $faculty->faculty_name }}</option>                      
                                @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="mt-2">
                          <button type="submit" class="btn btn-primary me-2">Save changes</button>
                        </div>
                    </div>
                    <!-- /Account -->
                    </form>  
                </div>
                  
              </div>
            </div>
            <!-- / Content -->

            

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('vendor/assets/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('vendor/assets/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('vendor/assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('vendor/assets/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('vendor/assets/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{ asset('js/assets/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('js/assets/pages-account-settings-account.js') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>            

    @include('layouts.preview')
@endsection

