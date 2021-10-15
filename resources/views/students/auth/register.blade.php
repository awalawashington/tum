@extends('layouts.portal.app')
@section('content')

</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">TUMSA</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                    <p class="text-center small">Enter your personal details to create an account</p>
                  </div>
                  <form action="{{ route('student.register') }}" method="post" class="row g-3 needs-validation" novalidate>
                  @csrf
                  <div class="row">
                    <div class="col-lg-6">
                      <label for="yourUsername" class="form-label">Sir Name</label>
                      <div class="input-group has-validation">
                        <input type="text" name="sir_name" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please enter your sir name</div>
                      </div>
                      @error('sir_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                      <label for="yourUsername" class="form-label">Other Names</label>
                      <div class="input-group has-validation">
                       
                        <input type="text" name="other_names" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please enter your other names</div>
                      </div>
                      @error('other_names')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-6">
                      <label for="yourUsername" class="form-label">Email</label>
                      <div class="input-group has-validation">
                        <input type="email" name="email" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please enter your email</div>
                      </div>
                      @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                      <label for="yourUsername" class="form-label">Phone Number</label>
                      <div class="input-group has-validation">
                        <input type="text" name="phone_number" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please enter your Phone Number</div>
                      </div>
                      @error('phone_number')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Admission Number</label>
                      <div class="input-group has-validation">
                        <input type="text" name="admission_number" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please enter your Admission Number</div>
                      </div>
                      @error('admission_number')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                  </div>
                   
                  <div class="row">
                    <div class="col-lg-6">
                      <label for="yourUsername" class="form-label">Gender</label>
                      <div class="input-group has-validation">
                        <input type="text" name="gender" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please select you gender</div>
                      </div>
                      @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                      <label for="yourUsername" class="form-label">Date of Birth</label>
                      <div class="input-group has-validation">
                        <input type="date" name="dob" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please enter Date of Birth</div>
                      </div>
                        @error('dob')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>
                    <div class="col-lg-6">
                      <label for="yourPassword" class="form-label">Password Confirmation</label>
                      <input type="password" name="password_confirmation" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please confirm your password!</div>
                    </div>
                  </div>
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    
                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                        <div class="invalid-feedback">You must agree before submitting.</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Create Account</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="{{ route('student.login') }}">Log in</a></p>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
                Designed by <a href="https://www.facebook.com/awalatechincorporation">AwalaTech Incorporation</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->
@endsection