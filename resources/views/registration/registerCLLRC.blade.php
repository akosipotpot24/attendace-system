<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="{{ asset('olopsc_logo.png') }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>


    <style>
      #font{
        font-family: 'Montserrat', sans-serif;
      }
    </style>
</head>
<body>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
          <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
              <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                <div class="card-body p-4 p-md-5">
                  <h1 class="mb-4 pb-2 pb-md-0 mb-md-5" id="font">Registration Form</h1>
                  <h3 class="mb-4 pb-2 pb-md-0 mb-md-5" id="font">College Learning Resource Center</h3>


                  @if (session()->has('success'))
                        <div class="container container--narrow">
                          <div class="alert alert-success text-center">
                            {{ session('success') }}
                          </div>
                        </div>
                        @endif

                        @if (session()->has('failure'))
                        <div class="container container--narrow">
                        <div class="alert alert-danger text-center">
                          {{ session('failure') }}
                        </div>
                        </div>
                        @endif


                  <form action="/register" method="POST">
                    @csrf
                    <div class="row">
                      <div class="col-md-6 mb-4">

                        <div data-mdb-input-init class="form-outline">
                          <label class="form-label" for="firstName" id="font">First Name</label>
                          <input type="text" id="firstName" name="firstname" class="form-control form-control-lg" />
                          @error('firstname')
                          <p class="m-0 small alert alert-danger shadow-sm" id="font">{{ $message }}</p>
                          @enderror

                        </div>

                      </div>
                      <div class="col-md-6 mb-4">

                        <div data-mdb-input-init class="form-outline">
                          <label class="form-label" for="surname" id="font">Last Name</label>
                          <input type="text" name="surname" id="surname" class="form-control form-control-lg" />
                          @error('surname')
                          <p class="m-0 small alert alert-danger shadow-sm" id="font">{{ $message }}</p>
                          @enderror

                        </div>

                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6 mb-4 d-flex align-items-center">

                        <div data-mdb-input-init class="form-outline datepicker w-100">
                          <label  class="form-label" id="font">Student Number</label>
                          <input type="text" name="cardnumber" class="form-control form-control-lg" id="birthdayDate" />
                          @error('cardnumber')
                          <p class="m-0 small alert alert-danger shadow-sm" id="font">{{ $message }}</p>
                          @enderror

                        </div>

                      </div>
                      <div class="col-md-6 mb-4">


                        <div class="col-12 mt-5">

                          <select id="font" name="categorycode"  class="form-control form-control-lg">
                            <option disabled selected>Choose option</option>
                            <option value="NTP">Non-Teaching Personnel</option>
                            <option value="FAC">Faculty</option>
                            <option value="AB-ENG">AB-ENG</option>
                            <option value="ACT">ACT</option>
                            <option value="BEE">BEE</option>
                            <option value="BSBA-HRD">BSBA-HRD</option>
                            <option value="BSBA-MM">BSBA-MM</option>
                            <option value="BSCS">BSCS</option>
                            <option value="BSE-ENG">BSE-ENG</option>
                            <option value="BSE-MATH">BSE-MATH</option>
                            <option value="BS-ENTREP">BS-ENTREP</option>
                            <option value="BSHM">BSHM</option>
                            <option value="BSTM">BSTM</option>


                          </select>
                          <label class="form-label select-label" id="font">Choose Program</label>
                          @error('grade_level')
                          <p class="m-0 small alert alert-danger shadow-sm" id="font">{{ $message }}</p>
                          @enderror
                        </div>


                      </div>
                    </div>

                    {{-- <div class="row">
                      <div class="col-md-6 mb-4 pb-2">

                        <div data-mdb-input-init class="form-outline">
                          <label class="form-label" for="emailAddress" id="font">Email</label>
                          <input type="email" name="email" id="email name=""Address" class="form-control form-control-lg" />

                          @error('email')
                          <p class="m-0 small alert alert-danger shadow-sm" id="font">{{ $message }}</p>
                          @enderror
                        </div>

                      </div> --}}
                      {{-- <div class="col-md-6 mb-4 pb-2">

                        <div data-mdb-input-init class="form-outline">
                          <label class="form-label" for="phoneNumber" id="font">Phone Number</label>
                          <input type="tel" id="phoneNumber"name="phone" class="form-control form-control-lg" />
                          @error('phone')
                          <p class="m-0 small alert alert-danger shadow-sm" id="font">{{ $message }}</p>
                          @enderror
                        </div>

                      </div>
                    </div> --}}

                    <input type="hidden" value="CLLRC" name="branchcode">

                    <input type="hidden" name="dateenrolled" value="{{ date('Y-m-d') }}">
                    <input type="hidden" value="active" name="status">

                    <div class="mt-4 pt-2">
                      <input data-mdb-ripple-init class="btn btn-primary btn-lg" type="submit" value="Submit" />
                      <a class="btn btn-danger btn-lg " href="/college" >BACK</a>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</body>
</html>
