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

            <div class="content-wrapper">
                <!-- Content -->
    
                <div class="container-xxl flex-grow-1 container-p-y">
                  <h4 class="fw-bold py-3 mb-4"></span> {{ $support_course->courses_id }} - {{ $support_course->courses_name }}</h4>
                  
                  <div class="row">
                    
                      
                      <div class="accordion mt-3" id="accordionExample">
                        <div class="card accordion-item">
                          <h2 class="accordion-header" id="headingOne">
                            <button
                              type="button"
                              class="accordion-button collapsed"
                              data-bs-toggle="collapse"
                              data-bs-target="#accordionOne"
                              aria-expanded="false"
                              aria-controls="accordionOne"
                            >
                            SKS
                            </button>
                          </h2>
    
                          <div
                            id="accordionOne"
                            class="accordion-collapse collapse"
                            data-bs-parent="#accordionExample"
                          >
                          <div class="accordion-body">
                            {{ $support_course->course_credits }}
                        </div>
                        
                          </div>
                        </div>
                        <div class="card accordion-item">
                          <h2 class="accordion-header" id="headingTwo">
                            <button
                              type="button"
                              class="accordion-button collapsed"
                              data-bs-toggle="collapse"
                              data-bs-target="#accordionTwo"
                              aria-expanded="false"
                              aria-controls="accordionTwo"
                            >
                              Deskripsi
                            </button>
                          </h2>
                          <div
                            id="accordionTwo"
                            class="accordion-collapse collapse"
                            aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample"
                          >
                            <div class="accordion-body">
                               {{ $support_course->desc }}
                            </div>
                          </div>
                        
                        </div>
                      </div>
                    </div>
    
    
                    <!-- Basic Layout -->
                  
                    <div class="col-xl">
                      <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                          <h5 class="mb-0">Tambah Review</h5>
                          
                        </div>
                        <div class="card-body">
                          <form action="{{ route('storerev.add', $support_course->slug) }}" method="POST">
                            <div class="rating-box">
                              @csrf
                              <input type="hidden" name="courses_id" value="{{ $support_course->id }}">

                              @include('partials.rating', ['course' => $support_course])
                            
                            <div class="mb-3"></div>
                              
                              
                            </div>
                            <div class="mb-3">
                              
                              <textarea
                                id="basic-default-message"
                                class="form-control"
                                name="rev_sc"
                                
                              ></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" name="action" value="add">Submit</button>
                          </form>
                        </div>
                    </div>
                    <!-- Content wrapper -->
                                   
                        
                      @foreach ($reviews->sortByDesc('created_at') as $review)
                      <div class="card card-body col-12">
                          <div class="row">
                            <div class="col">
                            <div class="d-flex justify-content-start">
                                <strong>{{ $review->users->username }}</strong>
                                {{ \Carbon\Carbon::parse($review->created_at)->locale('id_ID')->isoFormat('D MMMM YYYY') }}
                            </div>
                            </div>
                            
                          <div class="col">
                          <div class="d-flex justify-content-end">
                              <button type="button" class="btn dropdown-toggle hide-arrow text-end " data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item" data-bs-toggle="collapse" href="#edit{{$loop->index}}"
                                    ><i class="bx bx-edit-alt me-2"></i> Edit</a
                                  >
                                  <a class="dropdown-item" href="#" onclick="deleteReview({{ $loop->index }})"
                                    ><i class="bx bx-trash me-2"></i> Delete</a
                                  >
                                </div>
                            </div>
                            </div>
                            <div class="form-group row pt-1 pb-3">
                              @include('partials.reviewrate', ['course' => $review->rating])
                            
                            </div>
                            
                          
          
                          
  
                            @if($review->user_id == auth()->user()->id)                                                                                                          
                            <div class="col-12 fs-5 pb-3">
                              {{ $review->rev_sc }}
                            </div>
                          









                        
                        
                        <form class="collapse multi-collapse" style="padding-left: 30px;" action="{{ route('scupdate.add') }}" method="POST" id="edit{{ $loop->index }}">
                            @method('put')
                            @csrf
        
                            @include('partials.editrate', ['course' => $review->rating, 'count' => $loop->index])
                            
                            <input type="hidden" name="rev_id" value="{{ $review->id }}">
                            <div class="col-12 ">
                                <textarea class="col-8 d-flex form-control" rows="5" name="rev_sc" id="rev_sc" wrap="hard" required>{{ $review->rev_sc }}</textarea>
                            </div>
                            <div class="pb-3 pt-3">
                              <button type="button" class="btn btn-primary" name="action" onclick="cancelForm({{ $loop->index }})">Cancel</button>
                              <button type="submit" class="btn btn-primary" name="action" value="save">Save</button>
                            </div>
                        </form>
                        <form action="{{ route('scdelete.add') }}" method="POST" id="del{{ $loop->index }}">
                            @method('delete')
                            @csrf
                            <input type="hidden" name="rev_id" value="{{ $review->id }}">
                        </form>
                        @endif
                        @include('partials.comment', ['review' => $review, 'type' => 'sc'])
                    </div>
                    <br><br>
                    
                    @endforeach
          </div>
        </div>

        <script>
          function deleteReview(formIndex) {
              event.preventDefault();

              var form = document.getElementById('del' + formIndex);
              form.submit();
          }
          function cancelForm(formIndex) {
            var form = document.getElementById('edit' + formIndex);
            form.classList.remove('show');
          }

        </script>
                <!-- / Content -->
        
                  <!--/ Accordion -->
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
    
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

@endsection
