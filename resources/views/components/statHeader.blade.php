<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>OLOPSC</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
    <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js" integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="main.css" />
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <!--boxicons-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    
  </head>
  <body>
    <header class="header-bar mb-3" style="background-color:#0a095f;">
      <div class="container d-flex flex-column flex-md-row align-items-center p-3">
        <h4 class="my-0 mr-md-auto font-weight-normal"><a href="/" style="color: #ffd230; font-family: 'Montserrat', sans-serif;" ><b> STATISTICS</b></a></h4>
        @auth


        <form action="/logout" method="POST">
          @csrf
          <button class="btn btn-danger float-end">Logout</button>
        </form>
        @else
      
        @endauth
      </div>
    </header>

    <!-- Add elements to display date and time -->
    <div class="container">
      <div class="row">
        <div class="col">
          <p id="current-date" class="text-center" style="font-size: 1.2em;"></p>
          <p id="current-time" class="text-center" style="font-size: 2em;"></p>
        </div>
      </div>
    </div>

   {{$slot}}

   <!-- footer begins -->
    <footer class="border-top text-center small text-muted py-3">
        <p class="m-0">Copyright &copy;  {{ now()->format('Y') }}  <a href="/" class="text-muted"><b>OLOPSC LRC Attendance System</b></a>. All rights reserved.</p>
      </footer>

      <!-- JavaScript Libraries -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
      <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    
    
    <script>
        $('[data-toggle="tooltip"]').tooltip();

        function updateTime() {
            const now = new Date();
            const dateOptions = { month: 'long', day: 'numeric', year: 'numeric' };
            const timeOptions = { hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: true };

            document.getElementById('current-date').textContent = now.toLocaleDateString('en-US', dateOptions);
            document.getElementById('current-time').textContent = now.toLocaleTimeString('en-US', timeOptions);
        }

        // Update every second
        setInterval(updateTime, 1000);
    </script>

    <script type="text/javascript">
        $('#mytable').DataTable({});
    </script>
  </body>
</html>
