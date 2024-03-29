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
              <a href="{{ route('mbkm.create') }}" class="btn btn-primary">Tambah MBKM</a>
            </div>

            <div class="container-xxl flex-grow-1 container-p-y">
              
              <!-- Basic Bootstrap Table -->
              <div class="card" style="overflow-y: scroll; heaight:400px">
                
                
                    <table class="table">
                        <tr>
                          <th>No</th>
                          <th>Nama MBKM</th>
                          <th>Periode Mulai</th>  
                          <th>Periode Akhir</th> 
                          <th>Rating</th>
                          <th>Slug</th>
                          <th>Action</th>
                        </tr>
                        @foreach($lists as $list)
                        <tr>
                            <td>{{ $num++ }}</td>
                            <td>{{ $list->mbkm_name }}</td>
                            <td>{{ date('d-m-Y', strtotime($list->periode_begin)) }}</td>
                            <td>{{ date('d-m-Y', strtotime($list->periode_end)) }}</td>
                            <td>{{ $list->rating }}</td>
                            <td>{{ $list->slug }}</td>
                            <td>
                              
                            <form id="edit-form" action="{{ route('mbkm.edit', $list->slug) }}" method="GET">
                                <button class="dropdown-item" type="submit">
                                  <i class="bx bx-edit me-1"></i>Edit
                                </button>
                              </form>

                              <form id="delete-form" action="{{ route('mbkm.destroy', $list->slug) }}" method="POST">
                                @csrf
                                @method('delete')
                                
                                <button class="dropdown-item" type="button" onclick="confirmDelete()">
                                  <i class="bx bx-trash me-1"></i>Delete
                                </button>
                              </form>

                            </td>
                        @endforeach

                      </table>
                </div>
              </div>
              <!--/ Basic Bootstrap Table -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
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
    @include('partials.notif')
@endsection
