@extends('layouts.scmbkm')

@section('container')


     <!-- Layout wrapper -->
     <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            
         @include('partials.navbar')
  
          <!-- Layout container -->
          <div class="layout-page">

            <form action="{{ route('searchsc.add') }}" id="searchFrom">
            @include('partials.search')
            </form>

            <div class="main-panel">
                <div class="content-wrapper">
                              <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-semibold py-3 mb-4"><span class="text-muted fw-light">Support Course /</span> SC</h4>
  
                <!-- Toast with Placements -->
                <div
                  class="bs-toast toast toast-placement-ex m-2"
                  role="alert"
                  aria-live="assertive"
                  aria-atomic="true"
                  data-delay="2000"
                >
                  
                </div>
             <div class="card mb-4">
              <h5 class="card-header">Filter by</h5>
              <div class="card-body">
                <form action="{{ route('filtersc.add') }}" method="POST">
                @csrf
                <div class="row gx-3 gy-2 align-items-center">
                    <div class="col-md-3">
                    <label class="form-label" for="selectTypeOpt">Fakultas</label>
                    <select id="selectTypeOpt" class="form-select color-dropdown" name="filter">
                        <option value="all" selected>Pilih fakultas</option>
                        @foreach ($faculties as $faculty)
                        <option value="{{ $faculty->id }}" id="{{ $faculty->faculty_name }}">{{ $faculty->faculty_name }}</option>                      
                        @endforeach
                    </select>
                  </div>

                  <div class="col-md-3">
                    <label class="form-label" for="selectPlacement">Rating</label>
                    <select class="form-select placement-dropdown" id="selectPlacement" name="rate">
                        <option value="all" selected>Pilih rating</option>
                        <option value="1" id="option1">Bintang 5</option>
                        <option value="2" id="option2">Bintang lebih dari 4</option>
                        <option value="3" id="option3">Bintang kurang dari 4</option>
                    </select>
                  </div>

                  <div class="col-md-3">
                    <label class="form-label" for="showToastPlacement">&nbsp;</label>
                    <button id="showToastPlacement" class="btn btn-primary d-block">Search</button>
                  </div>
                </form>
                </div>
            
              </div>
              
              </div>

<<<<<<< HEAD

              <div>
              <div class="row row-cols-2 row-cols-md-3 g-3 ">
=======
              <div>
              <div class="row row-cols-2 row-cols-md-4 g-3 ">
>>>>>>> 8943f25ddda542e99b8496ef6fa05f6a07a0e029
                    @foreach($support_courses as $support_course)
                    
                    <div class="col">
                    <div class="card h-100">
<<<<<<< HEAD
                    @if($support_course->picture)
                        <img src="{{ asset('storage/'. $support_course->picture) }}" class="card-img-top" alt="Tampilan SC" style="width:40%; margin:auto;">
                    @else
                        <img src="{{ URL::to('/') }}/img/image1.jpg" class="card-img-top" alt="Tampilan SC" style="width:40%; margin:auto;">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title" style="font-size: 15px;">{{ $support_course->courses_id }} - {{ $support_course->courses_name }}</h5>
                        
                          <p>SKS: {{ $support_course->course_credits }}</p>
                        

                        <div class="pb-2">
                        @include('partials.reviewrate', ['course' => $support_course->rating])
                        </div>

=======
                    <img src='{{ asset("img/assets/elements/1.png") }}' class="card-img-top" alt="Course">
                    <div class="card-body">
                        <h5 class="card-title" style="font-size: 15px;">{{ $support_course->courses_id }} - {{ $support_course->courses_name }}</h5>
                        
                        <div>
                        @include('partials.reviewrate', ['course' => $support_course->rating])

                        </div>
>>>>>>> 8943f25ddda542e99b8496ef6fa05f6a07a0e029
                        <a href="/sc/{{ $support_course->slug }}"  class="pb-1" style="font-size: 15px;">View more</a>
                    </div>
                    </div>
                    </div>
                    @endforeach
                </div>
            </div>
            </div>
  

              <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
          </div>
          <!-- / Layout page -->
        </div>
  
        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
      </div>
      <!-- / Layout wrapper -->
  
      
  
      <!-- Core JS -->
      <!-- build:js assets/vendor/js/core.js -->
      <script src='{{ asset("vendor/assets/libs/jquery/jquery.js") }}'></script>
      <script src='{{ asset("vendor/assets/libs/popper/popper.js") }}'></script>
      <script src='{{ asset("vendor/assets/js/bootstrap.js") }}'></script>
      <script src='{{ asset("vendor/assets/libs/perfect-scrollbar/perfect-scrollbar.js") }}'></script>
  
      <script src='{{ asset("vendor/assets/js/menu.js") }}'></script>
      <!-- endbuild -->
  
      <!-- Vendors JS -->
      <script src='{{ asset("vendor/assets/libs/apex-charts/apexcharts.js") }}'></script>
  
      <!-- Main JS -->
      <script src='{{ asset("js/assets/main.js") }}'></script>
  
      <!-- Page JS -->
      <script src='{{ asset("js/assets/dashboards-analytics.js") }}'></script>
  
      <!-- Place this tag in your head or just before your close body tag. -->
      <script async defer src='{{ asset("https://buttons.github.io/buttons.js") }}'></script>




@endsection
