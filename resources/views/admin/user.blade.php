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

            <div class="container-xxl flex-grow-1 container-p-y">
              
              <!-- Basic Bootstrap Table -->
              <div class="card">
                
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <tr>
                          <th>No</th>
                          <th>Nama User</th>
                          <th>Username</th>
                          <th>Email</th>
                          <th>Profile Picture</th>
                          <th>Action</th>
                        </tr>
                        @foreach($lists as $list)
                        <tr>
                            <td>{{ $num++ }}</td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i><strong>{{ $list->name }}</strong></td>
                            <td>{{ $list->username }}</td>
                            <td>{{ $list->email }}</td>
                            <td>
                              <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                <li
                                  data-bs-toggle="tooltip"
                                  data-popup="tooltip-custom"
                                  data-bs-placement="top"
                                  class="avatar avatar-xs pull-up"
                                 
                                >
                                  @if($list->image)
                                  <img src="{{ asset('storage/'. $list->image) }}" alt="Avatar" class="rounded-circle" />
                                  @else
                                  <img src="{{ asset('img/user.png') }}" alt="Avatar" class="rounded-circle"/>
                                  @endif
                                </li>
                                
                                
                              </ul>
                            </td>
                            <td>
                              <form id="delete-form" action="{{ route('user.destroy', $list->id)  }}" method="POST">
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
