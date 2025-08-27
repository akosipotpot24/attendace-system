<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <title>OLOPSC</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('olopsc_logo.png') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />

    <!-- Font Awesome -->
    <script defer src="https://kit.fontawesome.com/59a89e2849.js" crossorigin="anonymous"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('main.css') }}" />
</head>
<body>

<!-- Header -->
<header class="header-bar mb-3" style="background-color:#0a095f;">
    <div class="container d-flex flex-column flex-md-row align-items-center p-3">
        <h4 class="my-0 mr-md-auto font-weight-normal">
            <a href="/1" style="color: #ffd230; font-family: 'Montserrat', sans-serif;"><b>OLOPSC</b></a>
        </h4>

        @auth
            <div class="mr-3">
                <select class="form-control form-control-sm input-dark" required style="background-color: #0a095f; color: #ffd230;" onchange="if(this.value) window.location.href=this.value;">
                    <option value="" disabled selected>Registration</option>
                    <option value="{{ url('/userreg') }}">User Registration</option>
                    <option value="{{ url('/reg') }}">Student Registration (GRADE SCHOOL)</option>
                    <option value="{{ url('/reghslrc') }}">Student Registration (HIGH SCHOOL)</option>
                    <option value="{{ url('/regcllrc') }}">Student Registration (COLLEGE)</option>
                </select>
            </div>

            <div class="mr-3">
                <a href="/stats" class="btn btn-success">Enter Statistics</a>
            </div>

            <div class="mr-3">
                <a href="/highschool" class="btn btn-primary">Patrons</a>
            </div>

            <form action="/logout" method="POST" class="m-0">
                @csrf
                <button class="btn btn-danger">Logout</button>
            </form>
        @endauth
    </div>
</header>

<!-- Page Content -->
<div class="container mt-5 mb-3">
    <div class="col-lg-4">
        <select name="UserType" class="form-control form-control-sm input-dark" required onchange="if(this.value) window.location.href=this.value;">
            <option value="" disabled selected>Students</option>
            <option value="{{ url('/inactiveStudents') }}">Inactive Students</option>
            <option value="{{ url('/gradeschool') }}">Grade School Students</option>
            <option value="{{ url('/highschool') }}">High School Students</option>
            <option value="{{ url('/college') }}">College Students</option>
        </select>
    </div>
</div>

<div class="container mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-lg rounded-lg">
                <div class="card-header text-center">
                    <h2>PATRONS</h2>
                </div>
                <div class="card-body">
                    <table id="all" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Card Number</th>
                                <th>Surname</th>
                                <th>First Name</th>
                                <th>Branch Code</th>
                                <th>Category Code</th>
                                <th>Sort1</th>
                                <th>Avatar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <td>{{ $student['cardnumber'] }}</td>
                                    <td>{{ $student['surname'] }}</td>
                                    <td>{{ $student['firstname'] }}</td>
                                    <td>{{ $student['branchcode'] }}</td>
                                    <td>{{ $student['categorycode'] }}</td>
                                    <td>{{ $student['sort1'] }}</td>
                                    <td>
                                        @if($student['avatar'])
                                            <img src="{{ Storage::url('avatars/' . $student['avatar']) }}" alt="avatar" width="50" height="50" loading="lazy">
                                        @else
                                            <img src="{{ asset('storage/avatars/default.jpg') }}" alt="default avatar" width="50" height="50" loading="lazy">
                                        @endif
                                    </td>
                                    <td>
                                        <a href="/edit/{{ $student->borrowernumber }}" title="Edit">
                                            <i class="fa-solid fa-pen" style="color: green;"></i>
                                        </a>
                                        <a href="{{ route('borrowers.deactivate', $student->borrowernumber) }}" title="Deactivate">
                                            <i class="fa-solid fa-trash-can" style="color: red;"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> 
            </div> 
        </div> 
    </div> 
</div>

<!-- Footer -->
<footer class="border-top text-center small text-muted py-3">
    <p class="m-0">&copy; {{ now()->format('Y') }}
        <a href="/" class="text-muted"><b>OLOPSC LRC Attendance System</b></a>. All rights reserved.
    </p>
</footer>

<!-- JS Libraries -->
<script defer src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script defer src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script defer src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- DataTable Initialization -->
<script defer>
    document.addEventListener('DOMContentLoaded', function () {
        const tables = ['#mytable', '#HST01', '#HST02', '#HST03', '#HST04', '#HST05', '#HST06',
                        '#ABENG', '#ACT', '#BEE', '#HRD', '#MM', '#BSCS', '#ENG', '#MATH',
                        '#ENTREP', '#BSHM', '#BSTM', '#all'];

        tables.forEach(id => {
            if ($(id).length) {
                $(id).DataTable();
            }
        });
    });
</script>

<!-- SweetAlert for Session Errors -->
<script defer>
    document.addEventListener('DOMContentLoaded', function () {
        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Login Failed',
                text: '{{ session("error") }}',
                confirmButtonColor: '#d33'
            });
        @endif
    });
</script>

<!-- Live Date/Time Script -->
<script defer>
    document.addEventListener('DOMContentLoaded', function () {
        function updateTime() {
            const now = new Date();
            const dateOptions = { month: 'long', day: 'numeric', year: 'numeric' };
            const timeOptions = { hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: true };

            if (document.getElementById('current-date')) {
                document.getElementById('current-date').textContent = now.toLocaleDateString('en-US', dateOptions);
            }
            if (document.getElementById('current-time')) {
                document.getElementById('current-time').textContent = now.toLocaleTimeString('en-US', timeOptions);
            }
        }

        setInterval(updateTime, 1000);
    });
</script>

</body>
</html>
