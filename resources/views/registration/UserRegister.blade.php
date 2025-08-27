<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="{{ asset('olopsc_logo.png') }}">
    <title>Document</title>
</head>

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

<body>
    <section class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
              <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
                  <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
      
                      <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">
                        SIGN UP  
                        
                    </p>
                     
      
                      <form action="/UserRegister" method="POST" class="mx-1 mx-md-4">
                              @csrf
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                          <div data-mdb-input-init class="form-outline flex-fill mb-0">
                            <label class="form-label" for="form3Example1c">Username</label>
                            <input type="text" name="username"id="form3Example1c" class="form-control"/>
                            

                            @error('username')
                            <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                            @enderror
                          </div>                        
                        </div>


                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                <label class="form-label" for="form3Example3c">Full Name</label>
                              <input type="text" name="fullname" id="form3Example3c" class="form-control" />
                            
                              @error('fullname')
                              <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                             @enderror
                            </div>    
                          </div>

                       

                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                          <div data-mdb-input-init class="form-outline flex-fill mb-0">
                            <label class="form-label" for="form3Example3c">Your Email</label>
                            <input type="email"name="email" id="form3Example3c" class="form-control" />
                         
                            @error('email')
                            <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                           @enderror
                          </div>
                        </div>



                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                          <div data-mdb-input-init class="form-outline flex-fill mb-0">
                            <label class="form-label" for="form3Example4c">Password</label>
                            <input type="password" name="password" id="form3Example4c" class="form-control" />
                          
                            @error('password')
                            <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                           @enderror
                          </div>
                        </div>


                
                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="form3Example4cd">Repeat your password</label>
                                <input type="password" name="password_confirmation" id="form3Example4cd" class="form-control" />
                        
                                @error('password_confirmation')
                                <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                                @enderror
                            </div> 
                        </div>
                        
                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fas fa-user fa-lg me-3 fa-fw"></i> <!-- Added icon to match password input -->
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="userType">Select User Type</label>
                                <select name="UserType" id="userType" class="form-control">
                                    <option value="" disabled selected></option>
                                    <option value="admin">Admin</option>
                                    <option value="pslrc">Preschool Library</option>
                                    <option value="gslrc">Grade School Library</option>
                                    <option value="hslrc">High School Library</option>
                                    <option value="cllrc">College Library</option>
                                </select>


                                @error('UserType')
                                <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                                @enderror
                                
                            </div>
                        </div>
                        
                        
                          
                          
                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                          <button type="submit"  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg mr-3">Register</button>

                        </div>
                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
          
                          <a class="btn btn-danger btn-lg " href="/1" >BACK</a>
                        </div>
                        
      
                      </form>
      
                    </div>
                    <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
      
                      <img src="{{ asset('olopsc_logo.png') }}"
                        class="img-fluid" alt="Sample image">
                        
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</body>
<script>
    function selectOption(value) {
      document.getElementById('dropdownInput').value = value;
    }
  </script>
</html>