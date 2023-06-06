@extends('layouts.adminmain')

@section('container')
     <!-- Layout wrapper -->
     <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            
         @include('partials.adminav')
  
          <!-- Layout container -->
          <div class="layout-page">

            @include('partials.search')

            <div class="main-panel">
                <div class="content-wrapper">
                  
                  <div class="row">
                    <div class="col-md-3 grid-margin stretch-card">
                      <div class="card">
                        <div class="card-body">
                          <p class="card-title text-md-center text-xl-left">User</p>
                          <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                            <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{ $user }} User</h3>
                            <i class="menu-icon tf-icons bx bx-collection"></i>
                          </div>                       
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 grid-margin stretch-card">
                      <div class="card">
                        <div class="card-body">
                          <p class="card-title text-md-center text-xl-left">MBKM</p>
                          <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                            <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{ $mbkm }} MBKM</h3>
                            <i class="menu-icon tf-icons bx bx-collection"></i>
                          </div>  
                          
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-md-3 grid-margin stretch-card">
                      <div class="card">
                        <div class="card-body">
                          <p class="card-title text-md-center text-xl-left">SC</p>
                          <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                            <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{ $sc }} SC</h3>
                            <i class="menu-icon tf-icons bx bx-collection"></i>
                          </div>  
                          
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <p class="card-title text-md-center text-xl-left">Review</p>
                            <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                              <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{ $reviewsc + $reviewmbkm }} Review</h3>
                              <i class="menu-icon tf-icons bx bx-collection"></i>
                            </div>  
                            
                          </div>
                        </div>
                      </div>
                  </div>
    
                  <div class="content-wrapper">
                    <!-- Content -->
                    
                    
                    <h4 class="fw-semibold py-3 mb-4"><span class="text-muted fw-light">Review /</span> SC</h4>
                      
                      <!-- Basic Bootstrap Table -->
                      
                          <div class="card" style="overflow-y: scroll; height:400px">
                            <table class="table">
                              <tr>
                                  <th>Nama Course</th>
                                  <th>Username</th>
                                  <th>Review</th>
                                  <th>Action</th>
                              </tr>
                              @foreach($reviewscs as $reviewsc)
                              <tr>
                                  <td>{{ $reviewsc->supportcourse->courses_name }}</td>
                                  <td>{{ $reviewsc->users->username }}</td>
                                  <td>{{ $reviewsc->rev_sc }}</td>
                              <td>
                                      
                              <form id="delete-form" action="{{ route('scdelete.add')  }}" method="POST">
                                @csrf
                                @method('delete')
                                
                                  <input type="hidden" name="rev_id" value="{{ $reviewsc->id }}">
                                  <button class="dropdown-item"  type="button" onclick="confirmDelete()">
                                    <i class="bx bx-trash me-1"></i>Delete
                                  </button>
                                </div>
                              </form>
                              </td>
                              </tr>
                              @endforeach
                            </table>
                          </div>
                        
                            
                        </div>


                        <h4 class="fw-semibold py-3 mb-4"><span class="text-muted fw-light">Review /</span> MBKM</h4>
                      
                      <!-- Basic Bootstrap Table -->
                      
                          <div class="card" style="overflow-y: scroll; height:400px">
                            <table class="table">
                              <tr>
                                  <th>Nama MBKM</th>
                                  <th>Username</th>
                                  <th>Review</th>
                                  <th>Action</th>
                              </tr>
                              @foreach($reviewmbkms as $reviewmbkm)
                              <tr>
                                  <td>{{ $reviewmbkm->mbkm->mbkm_name }}</td>
                                  <td>{{ $reviewmbkm->users->username }}</td>
                                  <td>{{ $reviewmbkm->rev_mbkm }}</td>
                              <td>
                                      
                              <form id="delete-form" action="{{ route('mdelete.add')  }}" method="POST">
                                @csrf
                                @method('delete')
                                
                                  <input type="hidden" name="rev_id" value="{{ $reviewmbkm->id }}">
                                  <button class="dropdown-item"  type="button" onclick="confirmDelete()">
                                    <i class="bx bx-trash me-1"></i>Delete
                                  </button>
                                </div>
                              </form>
                              </td>
                              </tr>
                              @endforeach
                            </table>
                          </div>
                        
                            
                        </div>
                      </div>


                      


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



 
