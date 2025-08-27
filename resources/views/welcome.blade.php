<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700&display=swap" rel="stylesheet" />
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="{{ asset('olopsc_logo.png') }}">
    <title>Document</title>
</head>

<body>
    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
              <div class="card rounded-3 text-black">
                <div class="row g-0">
                  <div class="col-lg-6">
                    <div class="card-body p-md-5 mx-md-4">
                      
                      @if (session()->has('logout'))
                      <div class="container container--narrow">
                      <div class="alert alert-danger text-center">
                        {{ session('logout') }}
                      </div>
                      </div>
                      @endif
                   

                      <div class="text-center">
                        <img src="{{ asset('olopsc_logo.png') }}"
                          style="width: 185px;" alt="logo">
                        <h4 class="mt-1 mb-5 pb-1">LEARNING RESOURCE CENTER</h4>
                      </div>
      
                      <form action="/login" method="POST">
                        @csrf
                        <p>Please login to your account</p>
      
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

                        <div data-mdb-input-init class="form-outline mb-4 ">
                          <input type="username" id="form2Example11" name="username" class="form-control"
                            placeholder="username"  req/>
                         
                        </div>
      
                        <div data-mdb-input-init class="form-outline mb-4">
                          <input name="password"type="password" id="form2Example22" class="form-control" placeholder="Password"/>
                          
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-user fa-lg fa-fw"></i> <!-- Added icon -->
                          <div class="form-outline flex-fill mb-0">
                              <label class="form-label" for="userType">Select User Type</label>
                              <select name="UserType" id="userType" class="form-control">
                                  <option value="" disabled selected>Choose user type...</option>
                                  <option value="admin">Admin</option>
                                  <option value="pslrc">Preschool Library</option>
                                  <option value="gslrc">Grade School Library</option>
                                  <option value="hslrc">High School Library</option>
                                  <option value="cllrc">College Library</option>
                              </select>
                          </div>
                      </div>
                      

                        <div class="text-center pt-1 mb-5 pb-1">
                          <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Log
                            in</button>
                          <a class="text-muted" href="#!"></a>
                        </div>
      
                        {{-- <div class="d-flex align-items-center justify-content-center pb-4">
                          <p class="mb-0 me-2">Don't have an account?</p>
                          <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-danger">Create new</button>
                        </div>
       --}}
                      </form>
      
                    </div>
                  </div>
                 <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
    <div class="text-white px-3 py-4 p-md-5 mx-md-4" style="font-family: 'Montserrat', sans-serif;">
      <iframe src="https://free.timeanddate.com/clock/i9t5s3gk/n145/szw110/szh110/hoc000/hbw2/hfceee/cf100/hncccc/fdi76/mqc000/mql10/mqw4/mqd98/mhc000/mhl10/mhw4/mhd98/mmc000/mml10/mmw1/mmd98" frameborder="0" width="110" height="110"></iframe>
  
      <h2 class="mb-4">GOOD DAY!</h2>
        <h3>
            <strong>
             
                <p class="small mb-0">
                    <span  id="current-date">{{ now()->format('F j, Y') }}</span>, 
                    <span id="current-time">{{ now()->format('h:i:s A') }}</span>
                </p>
            </strong>
        </h3>
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
    function updateTime() {
        const now = new Date();
        const dateOptions = { month: 'long', day: 'numeric', year: 'numeric' };
        const timeOptions = { hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: true };

        document.getElementById('current-date').textContent = now.toLocaleDateString('en-US', dateOptions);
        document.getElementById('current-time').textContent = now.toLocaleTimeString('en-US', timeOptions);
    }

    // Call updateTime immediately and set an interval to update it every second
    updateTime();
    setInterval(updateTime, 1000);
</script>
</html>