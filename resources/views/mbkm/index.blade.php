@extends('layouts.scmbkm')

@section('container')

     <!-- Layout wrapper -->
     <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            
         @include('partials.navbar')
  
          <!-- Layout container -->
          <div class="layout-page">

            <form action="{{ route('searchm.add') }}" id="searchFrom">
                @include('partials.search')
            </form>

            <div class="main-panel">
                <div class="content-wrapper">
                              <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-semibold py-3 mb-4"><span class="text-muted fw-light">Merdeka Belajar Kampus Merdeka /</span> MBKM</h4>
  
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
                <form action="{{ route('filterm.add') }}" method="POST">
                @csrf
                <div class="row gx-3 gy-2 align-items-center">
                    <div class="col-md-3">
                    <label class="form-label" for="selectTypeOpt">Periode Mulai</label>
                    <select id="selectTypeOpt" class="form-select color-dropdown" name="filter">
                        <option value="all" selected>Pilih bulan</option>
                        @foreach ($months as $month)
                        <option value="{{ $loop->index + 1  }}" id="{{ $month }}">{{ $month }}</option>                      
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
              
              
              <div class="row mb-5">
                <div class="col-md">


                  </div>
                </div>
                <div class="row row-cols-md-2 g-3">
                @foreach ($mbkms as $mbkm)
                    <div class="col">
                      <div class="card" style="max-width: 540px;">
                        <div class="row g-0">
                            @if($mbkm->picture)
                            <img src="{{ asset('storage/'. $mbkm->picture) }}" class="card-img-top" alt="Tampilan MBKM" style="width:40%; margin:auto;">
                            @else
                                <img src="{{ URL::to('/') }}/img/image1.jpg" class="card-img-top" alt="Tampilan MBKM" style="width:40%; margin:auto;">
                            @endif
                          <div class="col-md-8">
                            <div class="card-body">
                              <h5 class="card-title" style="font-size: 15px;">{{ $mbkm->mbkm_name }}</h5>
                              <div>
                                @include('partials.reviewrate', ['course' => $mbkm->rating])
                              </div>
                              <p class="card-text pt-3" style="font-size: 14px;">
                              Periode pendaftaran: {{ \Carbon\Carbon::parse($mbkm->periode_begin)->locale('id_ID')->isoFormat('D MMMM YYYY') }}
                              </p>
                              <p class="card-text"><small class="text-muted">{{ $mbkm->excerpt }} </small></p>
                              <a href="/mbkm/{{ $mbkm->slug }}" class="pb-1" style="font-size: 15px;">View more</a>
                            </div>
                          </div> 
                        </div>
                      </div>
                    </div>
                    @endforeach
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
