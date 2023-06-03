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


            <div class="content-wrapper">
                <!-- Content -->
    
                <div class="container-xxl flex-grow-1 container-p-y">
                  <h4 class="fw-bold py-3 mb-4"></span> {{ $title }}</h4>
                  
                  <div class="row">
                    
                      
                      <div class="accordion mt-3" id="accordionExample">
                        <div class="card accordion-item">
                          <h2 class="accordion-header" id="headingZero">
                            <button
                              type="button"
                              class="accordion-button collapsed"
                              data-bs-toggle="collapse"
                              data-bs-target="#panelsStayOpen-collapseOne"
                              aria-expanded="true"
                              aria-controls="panelsStayOpen-collapseOne"
                            >
                              Periode Pendaftaran
                            </button>
                          </h2>
                          <div
                            id="panelsStayOpen-collapseOne"
                            class="accordion-collapse collapse show"

                            >
                            <div class="accordion-body">
                              {{ \Carbon\Carbon::parse($mbkm->periode_begin)->locale('id_ID')->isoFormat('D MMMM YYYY') }} - {{ \Carbon\Carbon::parse($mbkm->periode_end)->locale('id_ID')->isoFormat('D MMMM YYYY') }}
                            </div>
                          </div>
                        </div>
                        <div class="card accordion-item">
                          <h2 class="accordion-header" id="headingTwo">
                            <button
                              type="button"
                              class="accordion-button collapsed"
                              data-bs-toggle="collapse"
                              data-bs-target="#panelsStayOpen-collapseTwo"
                              aria-expanded="false"
                              aria-controls="panelsStayOpen-collapseTwo"
                            >
                            Benefit
                            </button>
                          </h2>
    
                          <div
                            id="panelsStayOpen-collapseTwo"
                            class="accordion-collapse collapse"
                            aria-labelledby="headingTwo"
                          >
                          <div class="accordion-body">
                            @foreach(explode('.',$mbkm->benefit) as $row)
                            <li>{{ $row }}</li>
                            @endforeach
                        </div>
                        
                          </div>
                        </div>
                        <div class="card accordion-item">
                          <h2 class="accordion-header" id="headingThree">
                            <button
                              type="button"
                              class="accordion-button collapsed"
                              data-bs-toggle="collapse"
                              data-bs-target="#panelsStayOpen-collapseThree"
                              aria-expanded="false"
                              aria-controls="panelsStayOpen-collapseThree"
                            >
                              Position
                            </button>
                          </h2>
                          <div
                            id="panelsStayOpen-collapseThree"
                            class="accordion-collapse collapse"
                            aria-labelledby="headingThree"
                            
                          >
                            <div class="accordion-body">
                                @foreach(explode(',',$mbkm->positions) as $row)
                                <li>{{ $row }}</li>
                                @endforeach
                            </div>
                          </div>
                        </div>
                        <div class="card accordion-item">
                          <h2 class="accordion-header" id="headingFour">
                            <button
                              type="button"
                              class="accordion-button collapsed"
                              data-bs-toggle="collapse"
                              data-bs-target="#panelsStayOpen-collapseFour"
                              aria-expanded="false"
                              aria-controls="panelsStayOpen-collapseFour"
                            >
                            Requirements
                            </button>
                          </h2>
                          <div
                            id="panelsStayOpen-collapseFour"
                            class="accordion-collapse collapse"
                            
                          >
                            <div class="accordion-body">
                                @foreach(explode('.',$mbkm->requirements) as $row)
                                <li>{{ $row }}</li>
                                @endforeach
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
                            {{ auth()->user()->username }}
                            <form action="{{ route('storerevm.add', $mbkm->slug) }}" method="POST">
                              @csrf
                              <input type="hidden" name="mbkm_id" value="{{ $mbkm->id }}">
                              <div class="mb-3">
                                
                                @include('partials.rating', ['course' => $mbkm])
  
                              </div>
                              <div class="mb-3">
                                
                                <textarea
                                  id="basic-default-message"
                                  class="form-control"
                                  name="rev_mbkm"
                                  
                                  
                                ></textarea>
                              </div>
                              <button type="submit" class="btn btn-primary" name="action" value="add">Submit</button>
                          </div>
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
                              {{ $review->rev_mbkm }}
                            </div>
                          
                          
                          





                          <form class="collapse multi-collapse" action="{{ route('mupdate.add') }}" method="POST" id="edit{{ $loop->index }}">
                              @method('put')
                              @csrf
          
                              @include('partials.editrate', ['course' => $review->rating, 'count' => $loop->index])
                              
                              <input type="hidden" name="rev_id" value="{{ $review->id }}">
                              
                              <div class="col-12 pb-2 mb-3">
                                  <textarea class="col-8 d-flex form-control" rows="5" name="rev_sc" id="rev_sc" wrap="hard" required>{{ $review->rev_sc }}</textarea>
                              </div>
                              <div class="pb-2">
                              <button type="button" class="btn btn-primary" name="action" onclick="cancelForm({{ $loop->index }})">Cancel</button>
                              <button type="submit" class="btn btn-primary" name="action" value="save">Save</button>

                              </div>
                              
                          </form>
                          <form action="{{ route('mdelete.add') }}" method="POST" id="del{{ $loop->index }}">
                              @method('delete')
                              @csrf
                              <input type="hidden" name="rev_id" value="{{ $review->id }}">
                          </form>
                          @endif
                          @include('partials.comment', ['review' => $review, 'type' => 'mbkm'])
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
