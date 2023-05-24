<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="shortcut icon"
      href="assets/images/favicon.svg"
      type="image/x-icon"
    />
    <title>Sign In </title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/home.css') }}" />
</head>
  <body>
          <div class="row g-0 auth-row">
            <div class="col-lg-6">
              <div class="auth-cover-wrapper bg-primary-100">
                <div class="auth-cover">
                  
                  <div class="title text-center">
                    <h1 class="text-primary mb-10">WELCOME BACK!</h1>
                    <p class="text-medium">
                      Course Selection made easily with I-Course Center
                      
                    </p>
                  </div>
                  
                  
                </div>
              </div>
            </div>
            <!-- end col -->
            <div class="col-lg-6">
              <div class="signup-wrapper">
                <div class="form-wrapper">
                  <h6 class="mb-15">Sign In Form</h6>
                  <p class="text-sm mb-25">
                    Please login to your account
                  </p>
                  <form action="#">
                    <div class="row">
                      <div class="col-12">
                        <div class="input-style-1">
                          <label>Email</label>
                          <input type="email" placeholder="Email" />
                        </div>
                      </div>
                      <!-- end col -->
                      
                      <!-- end col -->
                      <div class="col-12">
                        <div class="input-style-1">
                          <label>Password</label>
                          <input type="password" placeholder="Password" />
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
                          >
                            Sign In
                          </button>
                        </div>
                      </div>
                    </div>
                    <!-- end row -->
                    <p class="text-sm text-medium text-dark text-center">
                      New User? <a href="signup.html">Sign Up</a>
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
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
  </body>
</html>