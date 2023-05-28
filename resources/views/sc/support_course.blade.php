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
                        <div class="card accordion-item active">
                          <h2 class="accordion-header" id="headingOne">
                            <button
                              type="button"
                              class="accordion-button"
                              data-bs-toggle="collapse"
                              data-bs-target="#accordionOne"
                              aria-expanded="true"
                              aria-controls="accordionOne"
                            >
                            SKS
                            </button>
                          </h2>
    
                          <div
                            id="accordionOne"
                            class="accordion-collapse collapse show"
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
                          {{ auth()->user()->username }}
                          <form action="{{ route('storerev.add', $support_course->slug) }}" method="POST">
                            @csrf
                            <input type="hidden" name="courses_id" value="{{ $support_course->id }}">
                            <div class="mb-3">
                              
                              @include('partials.rating', ['course' => $support_course])

                            </div>
                            <div class="mb-3">
                              
                              <textarea
                                id="basic-default-message"
                                class="form-control"
                                name="rev_sc"
                                
                                
                              ></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" name="action" value="add">Submit</button>
                        </div>
                      </form>
                      </div>
                    </div>
                    <!-- Content wrapper -->
                    <div class="container">
                      <h3>Learner Review</h3>
                      @foreach ($reviews->sortByDesc('created_at') as $review)
                      <div class="comment__container opened" id="first-comment">
                          <div class="comment__card">
                              <strong>{{ $review->users->username }}</strong>
                              {{ \Carbon\Carbon::parse($review->created_at)->locale('id_ID')->isoFormat('D MMMM YYYY') }}
                              <div class="form-group row">
                                Rating: {{ $review->rating }}
                              </div>
                              <p>
                                {{ $review->rev_sc }}
                              </p>
                              
                              

                              @if($review->user_id == auth()->user()->id)
                              <a data-bs-toggle="collapse" href="#edit{{$loop->index}}" aria-expanded="false" aria-controls="edit{{$loop->index}}">Edit</a>
                              <form class="collapse multi-collapse" action="{{ route('scupdate.add') }}" method="POST" id="edit{{ $loop->index }}">
                                  @method('put')
                                  @csrf
              
                                  @include('partials.editrate', ['course' => $review->rating, 'count' => $loop->index])
                                  
                                  <input type="hidden" name="rev_id" value="{{ $review->id }}">
                                  <div class="col-12">
                                      <textarea class="col-8 d-flex" rows="5" name="rev_sc" id="rev_sc" wrap="hard" required>{{ $review->rev_sc }}</textarea>
                                  </div>
                                  <button type="submit" class="btn btn-primary" name="action" value="cancel">cancel</button>
                                  <button type="submit" class="btn btn-primary" name="action" value="save">save</button>
                              </form>
                              <form action="{{ route('scdelete.add') }}" method="POST">
                                  @method('delete')
                                  @csrf
                                  <input type="hidden" name="rev_id" value="{{ $review->id }}">
                                  <button type="submit" class="btn btn-primary" name="action" value="delete">delete</button>
                              </form>
                              @endif

                              @include('partials.comment', ['review' => $review, 'type' => 'sc'])
                          </div>

                      </div>
                      @endforeach

          </div>
        </div>
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