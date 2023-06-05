@extends('layouts.logsign')

@section('container')
<div class="row g-0 auth-row">
  <div class="col-lg-6">
    <div class="auth-cover-wrapper bg-primary-100">
      <div class="auth-cover">
        <img src="{{ asset('img/assetslogin/auth/logo.png') }}">
        
        <div class="title text-center">
          <h1 class="welcome-text">Welcome Back!</h1>
          <h2 class="Course">
            Course Selection made easily with I-Course Center </h2>
          <h3 class = "namaweb"> I-Course Center </h3>
        </div>
        
        
      </div>
    </div>
  </div>
  <!-- end col -->
  <div class="col-lg-6">
    <div class="signup-wrapper">
      <div class="form-wrapper">

        <h6 class="logintext">Login</h6>
        <p class="text-sm mb-25">
          Silakan masuk dengan akun Anda
        </p>
        <form action="/login" method="POST">
          @csrf
          <div class="row">
            <div class="col-12">
              <div class="input-style-1">
                <label>Email / Username</label>
                <input type="text" placeholder="Email / Username" name="login" class="form-control @error('login') is-invalid @enderror" value="{{ old('login') }}" required/>
              </div>
            </div>
            <!-- end col -->
            
            <!-- end col -->
            <div class="col-12">
              <div class="input-style-1">
                <label>Password</label>
                <input type="password" placeholder="Password" name="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,100}" title="Minimal satu angka, satu huruf kecil, satu huruf kapital, dan sepanjang 8 karakter atau lebih!"/>
              </div>
            </div>

            <div class="col-12 mb-4">
              <input class="form-check-input" type="checkbox" value="true" id="remember_me" name="remember_me">
              <label class="form-check-label" for="remember_me">
                Remember me
              </label>
            </div>
            

            <!-- end col -->
           
            <!-- end col -->
            <div class="col-12">
              <div
                class="
                  button-group
                  d-flex
                  justify-content-center
                  flex-wrap
                "
              >
                <button
                  class="
                    main-btn
                    primary-btn
                    btn-hover
                    w-100
                    text-center
                  "
                >
                  Masuk
                </button>
              </div>
            </div>
          </div>
        </form>
          <!-- end row -->
          <p class="text-sm text-medium text-dark text-center">
            Belum memiliki akun? <a href="/signup">Sign Up</a>
          </p>

          
        </div>
      </div>
    </div>
  </div>
  <!-- end col -->
</div>
<!-- end row -->
</div>
</section>
<!-- ========== signin-section end ========== -->



<!-- ========= All Javascript files linkup ======== -->

<script src="{{ asset('js/assets/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/assets/main.js') }}"></script>


<style>
  .swal2-popup {
        width: 400px; 
        height: 50px; 
        font-size: 8px;
        font-family: Arial, sans-serif;
        color: #0E7658;
        text-align: center;
        border: 1px solid #1CAF66;
        background-color: #D1E7DD;
        
      }
</style>

@include('partials.notif')

@endsection