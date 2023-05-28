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
                    
                    
                    <h4 class="fw-semibold py-3 mb-4"><span class="text-muted fw-light">Review /</span> MBKM</h4>
                      
                      <!-- Basic Bootstrap Table -->
                      
                        
                        
                            <table class="table">
                                <tr>
                                    <th>Nama Course</th>
                                    <th>Username</th>
                                    <th>Review</th>
                                    <th>Action</th>
                                </tr>
                                @foreach($reviewmbkms as $reviewmbkm)
                                <tr>
                                    <td>{{ $reviewmbkm->mbkm->courses_name }}</td>
                                    <td>{{ $reviewmbkm->users->username }}</td>
                                    <td>{{ $reviewmbkm->rev_mbkm }}</td>
                                <td>
                                        
                                <div class="demo-inline-spacing custom-edit">
                                    <button type="button" class="btn btn-primary">Delete</button>
                                </div>
                                </td>
                                </tr>
                                @endforeach
                              </table>
                        </div>
                      </div>
                      <!--/ Basic Bootstrap Table -->
{{-- 

                      <h4 class="fw-semibold py-3 mb-4"><span class="text-muted fw-light">Review /</span> SC</h4>
                      
                      <!-- Basic Bootstrap Table -->
                      
                        
                        
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
                                        
                                <div class="demo-inline-spacing custom-edit">
                                    <button type="button" class="btn btn-primary">Delete</button>
                                </div>
                                </td>
                                </tr>
                                @endforeach
                              </table>
                        </div>
                      </div>
                      <!--/ Basic Bootstrap Table --> --}}
    
@endsection



 