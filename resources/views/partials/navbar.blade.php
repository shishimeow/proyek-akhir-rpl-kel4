    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
          <!-- Menu -->
  
          <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo d-flex" style="padding-left: 10px;">
              <div class="img-container">
                <img src="{{ asset('img/assets/avatars/Logo.png') }}" alt="Logo" width="30%">
                <span class="app-brand-text demo fw-bolder ms-0" style="text-transform: capitalize; font-size: 20px; padding-top: 12px; padding-left: 5px;">I-CourseCenter</span>
              </div>  
                
  
              <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                <i class="bx bx-chevron-left bx-sm align-middle"></i>
              </a>
            </div>
  
            <div class="menu-inner-shadow"></div>
  
            <ul class="menu-inner py-4">
              <!-- Components -->
              
              <!-- Cards -->
              <li class="menu-item">
                <a href="/sc" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-collection"></i>
                  <div data-i18n="Basic">Supporting Course (SC)</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="/mbkm" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-collection"></i>
                  <div data-i18n="Basic">Merdeka Belajar Kampus Merdeka (MBKM)</div>
                </a>
              </li>
              @can('admin')

              <li class="menu-item">
                <a href="/admin" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-collection"></i>
                  <div data-i18n="Basic">Dashboard Admin</div>
                </a>
              </li>

              @endcan
                </ul>
              </li>
          </ul>
      </aside>
  
      <!-- Layout container -->
