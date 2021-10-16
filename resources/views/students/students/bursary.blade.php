@extends('layouts.portal.app')
@section('content')

</head>

<body>

@include('layouts.portal.students.navbar')

@include('layouts.portal.students.sidebar')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Bursary</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('student.dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Bursary</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-12">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Background</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">More Information</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Apply TUMSA Bursary</button>
                </li>



              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <p class="small fst-italic">Kindly take your time and give us the correct information</p>

                <form action="{{ route('student.bursary.family') }}" method="post" enctype="multipart/form-data" >
                  @csrf
                    <div class="row">
                        <fieldset class="row mb-3 col-lg-6">
                            <legend class="col-form-label col-sm-2 pt-0">Mother</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="mother" id="gridRadios1" value="1" onclick="ml()" checked>
                                <label class="form-check-label" for="gridRadios1">
                                    Alive
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="mother" id="gridRadios2" value="0" onclick="md()">
                                <label class="form-check-label" for="gridRadios2">
                                    Departed
                                </label>
                                </div>
                            </div>
                                @error('mother')
                                        <div class="my-3">
                                            <div class="text-danger">{{ $message }}</div>
                                        </div>
                                    @enderror
                        </fieldset>
                        <div class=" col-lg-6">
                            <div id="ml">
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <input name="mother_occupation" type="text" class="form-control" id="mother_occupation" placeholder="Mothers Occupation" required/>
                                    </div>
                                    @error('mother_occupation')
                                        <div class="my-3">
                                            <div class="text-danger">{{ $message }}</div>
                                        </div>
                                    @enderror
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <input name="mother_income" type="text" class="form-control" id="mother_income" placeholder="Mothers Income" required/>
                                    </div>
                                    @error('mother_income')
                                        <div class="my-3">
                                            <div class="text-danger">{{ $message }}</div>
                                        </div>
                                    @enderror
                                </div>
                                
                            </div>
                            <div id="md" style="display:none">
                                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Proof i.e death certificate</label>
                                    <div class="col-md-8 col-lg-9">
                                        <div class="pt-2">
                                        <input type="file" name="mother_dc" id="mother_dc" accept="">
                                        </div>
                                    </div>
                                    @error('mother_dc')
                                        <div class="my-3">
                                            <div class="error-message">{{ $message }}</div>
                                        </div>
                                    @enderror
                                </div>
                        </div>
                    </div>


                     <div class="row">
                        <fieldset class="row mb-3 col-lg-6">
                            <legend class="col-form-label col-sm-2 pt-0">Father</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="father" id="gridRadios1" value="1" onclick="fl()" checked>
                                <label class="form-check-label" for="gridRadios1">
                                    Alive
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="father" id="gridRadios2" value="0" onclick="fd()">
                                <label class="form-check-label" for="gridRadios2">
                                    Departed
                                </label>
                                </div>
                            </div>
                            @error('father')
                                        <div class="my-3">
                                            <div class="text-danger">{{ $message }}</div>
                                        </div>
                                    @enderror
                        </fieldset>
                        <div class=" col-lg-6">
                            <div id="fl">
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <input name="father_occupation" type="text" class="form-control" id="father_occupation" placeholder="Fathers Occupation" required/>
                                    </div>
                                    @error('father_occupation')
                                        <div class="my-3">
                                            <div class="text-danger">{{ $message }}</div>
                                        </div>
                                    @enderror
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <input name="father_income" type="text" class="form-control" id="father_income" placeholder="Fathers Income" required/>
                                    </div>
                                    @error('father_income')
                                        <div class="my-3">
                                            <div class="text-danger">{{ $message }}</div>
                                        </div>
                                    @enderror
                                </div>
                                
                            </div>
                            <div id="fd" style="display:none">
                                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Proof i.e death certificate</label>
                                    <div class="col-md-8 col-lg-9">
                                        <div class="pt-2">
                                        <input type="file" name="father_dc" accept="" id="father_dc" >
                                        </div>
                                    </div>
                                    @error('father_dc')
                                        <div class="my-3">
                                            <div class="error-message">{{ $message }}</div>
                                        </div>
                                    @enderror
                                </div>
                        </div>
                    </div>


                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form><!-- End -->
                  
                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                  <p class="small fst-italic">Kindly take your time and give us the correct information</p>
                  <!-- Profile Edit Form -->

                  <form action="{{ route('student.bursary.other_info') }}" method="post" enctype="multipart/form-data" >
                  @csrf
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">HELB</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="helb" type="text" class="form-control" id="fullName" >
                      </div>
                      @error('helb')
                          <div class="my-3">
                              <div class="text-danger">{{ $message }}</div>
                          </div>
                      @enderror
                    </div>


                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">CDF</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="cdf" type="text" class="form-control" id="company" >
                      </div>
                      @error('cdf')
                          <div class="my-3">
                              <div class="text-danger">{{ $message }}</div>
                          </div>
                      @enderror
                    </div>

                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Any Other Bursary</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="other_sponsors" type="text" class="form-control" id="company" >
                      </div>
                      @error('other_sponsors')
                          <div class="my-3">
                              <div class="text-danger">{{ $message }}</div>
                          </div>
                      @enderror
                    </div>

                    <fieldset class="row mb-3 col-lg-6">
                        <legend class="col-form-label col-sm-10 pt-0">Have you ever differed for accademic purposes?</legend>
                        <div class="col-sm-2">
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="differment" id="gridRadios1" value="0"  checked>
                            <label class="form-check-label" for="gridRadios1">
                                No
                            </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="differment" id="gridRadios2" value="1" >
                            <label class="form-check-label" for="gridRadios2">
                                Yes
                            </label>
                            </div>
                        </div>
                        @error('differment')
                            <div class="my-3">
                                <div class="text-danger">{{ $message }}</div>
                            </div>
                        @enderror
                    </fieldset>

                    <fieldset class="row mb-3 col-lg-6">
                        <legend class="col-form-label col-sm-10 pt-0">Are you a beneficiary of bursary or sponsorship before?</legend>
                        <div class="col-sm-2">
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="sponsored_before" id="gridRadios1" value="0"  checked>
                            <label class="form-check-label" for="gridRadios1">
                                No
                            </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="sponsored_before" id="gridRadios2" value="1" >
                            <label class="form-check-label" for="gridRadios2">
                                Yes
                            </label>
                            </div>
                        </div>
                        @error('sponsored_before')
                            <div class="my-3">
                                <div class="text-danger">{{ $message }}</div>
                            </div>
                        @enderror
                    </fieldset>

                    <fieldset class="row mb-3 col-lg-6">
                        <legend class="col-form-label col-sm-10 pt-0">Are you a beneficiary of school program</legend>
                        <div class="col-sm-2">
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="school_program" id="gridRadios1" value="0"  checked>
                            <label class="form-check-label" for="gridRadios1">
                                No
                            </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="school_program" id="gridRadios2" value="1" >
                            <label class="form-check-label" for="gridRadios2">
                                Yes
                            </label>
                            </div>
                        </div>
                        @error('school_program')
                            <div class="my-3">
                                <div class="text-danger">{{ $message }}</div>
                            </div>
                        @enderror
                    </fieldset>




                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-settings">
                  
                  <p class="small fst-italic">Kindly take your time and give us the correct information</p>
                  <!-- Settings Form -->
                  <form action="{{ route('student.bursary.tumsa') }}" method="post" enctype="multipart/form-data" >
                  @csrf
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Ammount Requested</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="ammount_requested" type="text" class="form-control" id="fullName" >
                      </div>
                      @error('ammount_requested')
                          <div class="my-3">
                              <div class="text-danger">{{ $message }}</div>
                          </div>
                      @enderror
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Fee Balance</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="fee_balance" type="text" class="form-control" id="fullName" >
                      </div>
                      @error('fee_balance')
                          <div class="my-3">
                              <div class="text-danger">{{ $message }}</div>
                          </div>
                      @enderror
                    </div>
                    
                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Stamped fees statement</label>
                    <div class="col-md-8 col-lg-9">
                        <div class="pt-2">
                        <input type="file" name="fee_statement" accept="" />
                        </div>
                    </div>
                    @error('fee_statement')
                        <div class="my-3">
                            <div class="error-message">{{ $message }}</div>
                        </div>
                    @enderror
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
                </div>
               
                </div>

            

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>
    <script>
        function md() {
            var x = document.getElementById("ml");
            var y = document.getElementById("md");
            
            y.style.display = "block";
            x.style.display = "none";
            document.getElementById("mother_income").required = false;
            document.getElementById("mother_occupation").required = false;
    
        }

        function ml() {
            var x = document.getElementById("ml");
            var y = document.getElementById("md");
            x.style.display = "block";
            y.style.display = "none";
            document.getElementById("mother_dc").required = false;
            
            
    
        }
        function fd() {
            var x = document.getElementById("fl");
            var y = document.getElementById("fd");  
            y.style.display = "block";
            x.style.display = "none";
            document.getElementById("father_income").required = false;
            document.getElementById("father_occupation").required = false;
            
    
        }

        function fl() {
            var x = document.getElementById("fl");
            var y = document.getElementById("fd");
            x.style.display = "block";
            y.style.display = "none";
            document.getElementById("father_dc").required = false;
    
        }
    </script>
  </main><!-- End #main -->
@endsection
