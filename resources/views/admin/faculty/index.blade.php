@extends('layouts.adminmain')

@section('container')

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">

        @include('partials.adminav')

        <!-- Layout container -->
        <div class="layout-page">

          @include('partials.search')

          <!--content-->
           <!-- Bootstrap Toasts with Placement -->
           <!-- Content wrapper -->
           <div class="content-wrapper">
            <!-- Content -->
            <div class="demo-inline-spacing custom-container">
              <a href="{{ route('faculty.create') }}" class="btn btn-primary">Tambah Fakultas</a>
            </div>

            <div class="container-xxl flex-grow-1 container-p-y">
              
              <!-- Basic Bootstrap Table -->
              <div class="card">
                
                
                    <table class="table">
                        <tr>
                          <th>No</th>
                          <th>Nama Fakultas</th>
                          <th>Slug</th>
                          <th>Action</th>
                        </tr>
                        @foreach($lists as $list)
                        <tr>
                            <td>{{ $num++ }}</td>
                            <td>{{ $list->faculty_name }}</td>
                            <td>{{ $list->slug }}</td>
                            <td>
                              
                              
                              <form id="edit-form" action= "{{ route('faculty.edit', $list->slug)  }}">
                                <button class="dropdown-item" type="submit">
                                  <i class="bx bx-edit me-1"></i>Edit
                                </button>
                              </form>
                              <form id="delete-form" action="{{ route('faculty.destroy', $list->slug)  }}" method="POST">
                                @csrf
                                @method('delete')
                                
                                <button class="dropdown-item" type="submit">
                                  <i class="bx bx-trash me-1"></i>Delete
                                </button>
                              </form>

                            </td>
                        </tr>
                        
                        @endforeach

                      </table>
                </div>
              </div>
              <!--/ Basic Bootstrap Table -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('vendor/assets/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('vendor/assets/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('vendor/assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('vendor/assets/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('vendor/assets/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('vendor/assets/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('js/assets/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('js/assets/dashboards-analytics.js') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    
    
<<<<<<< HEAD
@endsection
=======

<<<<<<< HEAD
@endsection
 
=======






@endsection
>>>>>>> 8943f25ddda542e99b8496ef6fa05f6a07a0e029
>>>>>>> 8cb7e72f0617e006a3788572394a475e3cbf469c
