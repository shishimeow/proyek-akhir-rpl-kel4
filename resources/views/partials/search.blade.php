          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    id="searchInput"
                    name="search"
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Search courses in this category ..."
                    aria-label="Search"
                    style="width: 300px"
                    value="{{ request('search') }}"
                  />
                </div>
              </div>
              
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                
                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      @if(auth()->user()->image)
                      <img src="{{ asset('storage/'. auth()->user()->image) }}" class="w-px-40 h-auto rounded-circle" alt="Tampilan User">
                      @else
                      <img src="{{ URL::to('/') }}/img/user.png" class="w-px-40 h-auto rounded-circle" alt="Tampilan User">
                      @endif
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              @if(auth()->user()->image)
                              <img src="{{ asset('storage/'. auth()->user()->image) }}" class="w-px-40 h-auto rounded-circle" alt="Tampilan User">
                              @else
                              <img src="{{ URL::to('/') }}/img/user.png" class="w-px-40 h-auto rounded-circle" alt="Tampilan User">
                              @endif
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">{{ auth()->user()->username }}</span>
                            @can('admin') <small class="text-muted">Admin</small> @endcan
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>

                    <li>
                      <a class="dropdown-item" href="/profile">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Settings</span>
                      </a>
                    </li>

                    <li>
                      <a class="dropdown-item" href="/logout">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
                


                
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->


          <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
          <script>
              $(document).ready(function() {
                  $('#searchInput').on('keyup', function(event) {
                      if (event.key === 'Enter') {
                          event.preventDefault(); // Prevent form submission
          
                          var searchValue = $(this).val();
                          $('#searchForm').append('<input type="hidden" name="search" value="' + searchValue + '">');
                          $('#searchForm').submit();
                      }
                  });
              });
          </script>