        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo">
              <div class="img-container">
                <img src="{{ asset('img/assets/avatars/Logo.png') }}" alt="Logo" width="35%">
                <span class="app-brand-text demo menu-text fw-bolder ms-2">Dashboard Admin</span>
              </div>     
              </a>
  
              <a href="/admin" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                <i class="bx bx-chevron-left bx-sm align-middle"></i>
              </a>
            </div>
  
            <div class="menu-inner-shadow"></div>
  
            <br>
            <ul class="menu-inner py-1">
              <!-- Components -->
             
              <!-- Cards -->
              <li class="menu-item">
                <a href="/admin" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-collection"></i>
                  <div data-i18n="Basic">Dashboard Admin</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="/admin/sc" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-collection"></i>
                  <div data-i18n="Basic">Supporting Course (SC)</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="/admin/mbkm" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-collection"></i>
                  <div data-i18n="Basic">Merdeka Belajar Kampus Merdeka (MBKM)</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="{{ route('faculty.index') }}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-collection"></i>
                  <div data-i18n="Basic">Fakultas</div>
                </a>
              </li>
              <li class="menu-item">
                  <a href="/admin/user" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-collection"></i>
                    <div data-i18n="Basic">List akun</div>
                  </a>
                </li>
                </ul>
              </li>
  
              
  
              
            </ul>
          </aside>
          <!-- / Menu -->