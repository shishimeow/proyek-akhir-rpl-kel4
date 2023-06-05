@extends('layouts.logsign')

@section('container')

<div class="row g-0 auth-row">
    <div class="col-lg-6">
      <div class="auth-cover-wrapper bg-primary-100">
        <div class="auth-cover">
          <img src={{ asset("img/assetslogin/auth/logo.png") }}>
          
          <div class="title text-center">
            <h1 class="welcome-text mt-5">Welcome!</h1>
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
        <h4 class="signuptext text-center text-lg-start">Sign Up</h4>

          <p class="text-sm mb-25">
            Create your account
          </p>
          <form action="{{ route('signup.add') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-12">
                  <div class="input-style-1">
                    <label>Name</label>
                    <input type="text" placeholder="Name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required/>
                  </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="input-style-1">
                  <label>Username</label>
                  <input type="text" placeholder="Username" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" required/>
                </div>
              </div>
              <!-- end col -->
              <div class="col-12">
                <div class="input-style-1">
                  <label>Email</label>
                  <input type="email" placeholder="Email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required/>
                </div>
              </div>
              <!-- end col -->
              <div class="col-12">
                <div class="input-style-1">
                  <label>Password</label>
                  <input type="password" placeholder="Password" name="password" class="form-control @error('password') is-invalid @enderror" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,100}" title="Minimal satu angka, satu huruf kecil, satu huruf kapital, dan sepanjang 8 karakter atau lebih!"/>
                </div>
              </div>

              <div class="col-12">
                <div class="input-style-1">
                  <label>Confirm Password</label>
                  <input type="password" placeholder="Confirm Password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" required/>
                </div>
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
                    type="submit"
                  >
                    Sign Up
                  </button>
                </div>
              </div>
            </div>
            <!-- end row -->
          </form>

            <p class="text-sm text-medium text-dark text-center">
              Already have an account? <a href="/login">Login</a>
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
<script src={{ asset("js/assets/bootstrap.bundle.min.js") }}></script>
<script src="{{ asset('js/assets/main.js') }}"></script>

@include('partials.notif')
@endsection
