<x-layout>
    <div class="container mt-5 mb-5">
        <div class="mr-3 col-lg-4" >

             <select name="UserType" class="form-control form-control-sm input-dark " required

                onchange="if(this.value) window.location.href=this.value;">
                <option value="" disabled selected>Students</option>
                <option value="{{ url('/allstudents') }}">ALL PATRONS</option>
                <option value="{{ url('/inactiveStudents') }}">Inactive students</option>
                <option value="{{ url('/gradeschool') }}">Grade School Students</option>
                <option value="{{ url('/highschool') }}">High School Students</option>
                <option value="{{ url('/college') }}">College Students</option>

            </select>

        </div>
     </div>

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
    <div class="container  mb-5  ">
       <div class="row">
           <div class="col-md-12">
               <div class="card shadow-lg rounded-lg ">
                   <div class="card-header text-center">
                       <h2>COLLEGE STUDENTS

                       </h2>
                   </div>
                   <div class="card-body">
                       <table id="mytable" class="table table-bordered table-striped">
                           <thead>
                               <tr>
                                <th>ID</th>
                                  <th>cardnumber</th>
                                   <th>surname</th>
                                   <th>firstname</th>
                                   <th>branchcode</th>
                                   <th>category code</th>
                                   <th>status</th>
                                   <th>Action</th>

                                   {{-- <th>Action</th> -- --}}
                               </tr>
                           </thead>
                           <tbody>
                               @foreach($students as $student)
                               <tr>
                                <td>{{ $student['borrowernumber'] }}</td>
                                 <td>{{ $student['cardnumber'] }}</td>
                                   <td>{{ $student['surname'] }}</td>
                                   <td>{{ $student['firstname'] }}</td>
                                   <td>{{ $student['branchcode'] }}</td>
                                   <td>{{ $student['categorycode'] }}</td>
                                   <td>{{ $student['status'] }}</td>

                                    <td >
                                        <a href="/editcollege/{{$student->borrowernumber}}" title="EDIT"><i style ="color:green;" class="fa-solid fa-pen"></i></a>
                                        {{-- <a href="/view/{{$student->borrowernumber}}"><i class="fa-solid fa-user"></i></a>  --}}
                                        <a href="{{ route('borrowers.deactivate', $student->borrowernumber) }}" title="DEACTIVATE MAM WENA WAG MONG PINDUTIN PLEASE">   <i style="color: red;" class="fa-solid fa-trash-can"></i></a>

                                        {{-- <form action="/delete/{{ $student->borrowernumber }}" method="POST" style="display: inline-block; margin-right: 5px;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer;">
                                                <i style="color: red;" class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </form> --}}
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








   <!--AB-ENG -->

   <div class="container  mb-5  ">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-lg rounded-lg ">
                <div class="card-header text-center">
                    <h2>BACHELOR ARTS IN ENGLISH

                    </h2>
                </div>
                <div class="card-body">
                    <table id="ABENG" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                             <th>ID</th>
                               <th>cardnumber</th>
                                <th>surname</th>
                                <th>firstname</th>
                                <th>branchcode</th>
                                <th>category code</th>
                                <th>status</th>
                                <th>Action</th>

                                {{-- <th>Action</th> -- --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ABENG as $student)
                            <tr>
                             <td>{{ $student['borrowernumber'] }}</td>
                              <td>{{ $student['cardnumber'] }}</td>
                                <td>{{ $student['surname'] }}</td>
                                <td>{{ $student['firstname'] }}</td>
                                <td>{{ $student['branchcode'] }}</td>
                                <td>{{ $student['categorycode'] }}</td>
                                <td>{{ $student['status'] }}</td>

                                 <td >
                                     <a href="/editcollege/{{$student->borrowernumber}}" title="EDIT"><i style ="color:green;" class="fa-solid fa-pen"></i></a>
                                     {{-- <a href="/view/{{$student->borrowernumber}}"><i class="fa-solid fa-user"></i></a>  --}}
                                     <a href="{{ route('borrowers.deactivate', $student->borrowernumber) }}" title="DEACTIVATE MAM WENA WAG MONG PINDUTIN PLEASE">   <i style="color: red;" class="fa-solid fa-trash-can"></i></a>

                                     {{-- <form action="/delete/{{ $student->borrowernumber }}" method="POST" style="display: inline-block; margin-right: 5px;">
                                         @csrf
                                         @method('DELETE')
                                         <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer;">
                                             <i style="color: red;" class="fa-solid fa-trash-can"></i>
                                         </button>
                                     </form> --}}
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



<!--ACT -->
<div class="container  mb-5  ">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-lg rounded-lg ">
                <div class="card-header text-center">
                    <h2>ASSOCIATE IN COMPUTER TECHNOLOGY

                    </h2>
                </div>
                <div class="card-body">
                    <table id="ACT" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                             <th>ID</th>
                               <th>cardnumber</th>
                                <th>surname</th>
                                <th>firstname</th>
                                <th>branchcode</th>
                                <th>category code</th>
                                <th>status</th>
                                <th>Action</th>

                                {{-- <th>Action</th> -- --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ACT as $student)
                            <tr>
                             <td>{{ $student['borrowernumber'] }}</td>
                              <td>{{ $student['cardnumber'] }}</td>
                                <td>{{ $student['surname'] }}</td>
                                <td>{{ $student['firstname'] }}</td>
                                <td>{{ $student['branchcode'] }}</td>
                                <td>{{ $student['categorycode'] }}</td>
                                <td>{{ $student['status'] }}</td>

                                 <td >
                                     <a href="/editcollege/{{$student->borrowernumber}}" title="EDIT"><i style ="color:green;" class="fa-solid fa-pen"></i></a>
                                     {{-- <a href="/view/{{$student->borrowernumber}}"><i class="fa-solid fa-user"></i></a>  --}}
                                     <a href="{{ route('borrowers.deactivate', $student->borrowernumber) }}" title="DEACTIVATE MAM WENA WAG MONG PINDUTIN PLEASE">   <i style="color: red;" class="fa-solid fa-trash-can"></i></a>

                                     {{-- <form action="/delete/{{ $student->borrowernumber }}" method="POST" style="display: inline-block; margin-right: 5px;">
                                         @csrf
                                         @method('DELETE')
                                         <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer;">
                                             <i style="color: red;" class="fa-solid fa-trash-can"></i>
                                         </button>
                                     </form> --}}
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


<!--BEE -->
<div class="container  mb-5  ">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-lg rounded-lg ">
                <div class="card-header text-center">
                    <h2>BACHELOR IN ELEMENTARY EDUCATION

                    </h2>
                </div>
                <div class="card-body">
                    <table id="BEE" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                             <th>ID</th>
                               <th>cardnumber</th>
                                <th>surname</th>
                                <th>firstname</th>
                                <th>branchcode</th>
                                <th>category code</th>
                                <th>status</th>
                                <th>Action</th>

                                {{-- <th>Action</th> -- --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($BEE as $student)
                            <tr>
                             <td>{{ $student['borrowernumber'] }}</td>
                              <td>{{ $student['cardnumber'] }}</td>
                                <td>{{ $student['surname'] }}</td>
                                <td>{{ $student['firstname'] }}</td>
                                <td>{{ $student['branchcode'] }}</td>
                                <td>{{ $student['categorycode'] }}</td>
                                <td>{{ $student['status'] }}</td>

                                 <td >
                                     <a href="/editcollege/{{$student->borrowernumber}}" title="EDIT"><i style ="color:green;" class="fa-solid fa-pen"></i></a>
                                     {{-- <a href="/view/{{$student->borrowernumber}}"><i class="fa-solid fa-user"></i></a>  --}}
                                     <a href="{{ route('borrowers.deactivate', $student->borrowernumber) }}" title="DEACTIVATE MAM WENA WAG MONG PINDUTIN PLEASE">   <i style="color: red;" class="fa-solid fa-trash-can"></i></a>

                                     {{-- <form action="/delete/{{ $student->borrowernumber }}" method="POST" style="display: inline-block; margin-right: 5px;">
                                         @csrf
                                         @method('DELETE')
                                         <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer;">
                                             <i style="color: red;" class="fa-solid fa-trash-can"></i>
                                         </button>
                                     </form> --}}
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




<!--HRD -->
<div class="container  mb-5  ">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-lg rounded-lg ">
                <div class="card-header text-center">
                    <h2>BSBA (HUMAN RESOURCE MANAGEMENT)

                    </h2>
                </div>
                <div class="card-body">
                    <table id="HRD" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                             <th>ID</th>
                               <th>cardnumber</th>
                                <th>surname</th>
                                <th>firstname</th>
                                <th>branchcode</th>
                                <th>category code</th>
                                <th>status</th>
                                <th>Action</th>

                                {{-- <th>Action</th> -- --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($HRD as $student)
                            <tr>
                             <td>{{ $student['borrowernumber'] }}</td>
                              <td>{{ $student['cardnumber'] }}</td>
                                <td>{{ $student['surname'] }}</td>
                                <td>{{ $student['firstname'] }}</td>
                                <td>{{ $student['branchcode'] }}</td>
                                <td>{{ $student['categorycode'] }}</td>
                                <td>{{ $student['status'] }}</td>

                                 <td >
                                     <a href="/editcollege/{{$student->borrowernumber}}" title="EDIT"><i style ="color:green;" class="fa-solid fa-pen"></i></a>
                                     {{-- <a href="/view/{{$student->borrowernumber}}"><i class="fa-solid fa-user"></i></a>  --}}
                                     <a href="{{ route('borrowers.deactivate', $student->borrowernumber) }}" title="DEACTIVATE MAM WENA WAG MONG PINDUTIN PLEASE">   <i style="color: red;" class="fa-solid fa-trash-can"></i></a>

                                     {{-- <form action="/delete/{{ $student->borrowernumber }}" method="POST" style="display: inline-block; margin-right: 5px;">
                                         @csrf
                                         @method('DELETE')
                                         <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer;">
                                             <i style="color: red;" class="fa-solid fa-trash-can"></i>
                                         </button>
                                     </form> --}}
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



<!--MM -->
<div class="container  mb-5  ">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-lg rounded-lg ">
                <div class="card-header text-center">
                    <h2>BSBA (MARKETING MANAGEMENT)

                    </h2>
                </div>
                <div class="card-body">
                    <table id="MM" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                             <th>ID</th>
                               <th>cardnumber</th>
                                <th>surname</th>
                                <th>firstname</th>
                                <th>branchcode</th>
                                <th>category code</th>
                                <th>status</th>
                                <th>Action</th>

                                {{-- <th>Action</th> -- --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($MM as $student)
                            <tr>
                             <td>{{ $student['borrowernumber'] }}</td>
                              <td>{{ $student['cardnumber'] }}</td>
                                <td>{{ $student['surname'] }}</td>
                                <td>{{ $student['firstname'] }}</td>
                                <td>{{ $student['branchcode'] }}</td>
                                <td>{{ $student['categorycode'] }}</td>
                                <td>{{ $student['status'] }}</td>

                                 <td >
                                     <a href="/editcollege/{{$student->borrowernumber}}" title="EDIT"><i style ="color:green;" class="fa-solid fa-pen"></i></a>
                                     {{-- <a href="/view/{{$student->borrowernumber}}"><i class="fa-solid fa-user"></i></a>  --}}
                                     <a href="{{ route('borrowers.deactivate', $student->borrowernumber) }}" title="DEACTIVATE MAM WENA WAG MONG PINDUTIN PLEASE">   <i style="color: red;" class="fa-solid fa-trash-can"></i></a>

                                     {{-- <form action="/delete/{{ $student->borrowernumber }}" method="POST" style="display: inline-block; margin-right: 5px;">
                                         @csrf
                                         @method('DELETE')
                                         <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer;">
                                             <i style="color: red;" class="fa-solid fa-trash-can"></i>
                                         </button>
                                     </form> --}}
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




<!--BSCS -->
<div class="container  mb-5  ">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-lg rounded-lg ">
                <div class="card-header text-center">
                    <h2>BACHELOR OF SCIENCE IN COMPUTER SCIENCE

                    </h2>
                </div>
                <div class="card-body">
                    <table id="BSCS" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                             <th>ID</th>
                               <th>cardnumber</th>
                                <th>surname</th>
                                <th>firstname</th>
                                <th>branchcode</th>
                                <th>category code</th>
                                <th>status</th>
                                <th>Action</th>

                                {{-- <th>Action</th> -- --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($BSCS as $student)
                            <tr>
                             <td>{{ $student['borrowernumber'] }}</td>
                              <td>{{ $student['cardnumber'] }}</td>
                                <td>{{ $student['surname'] }}</td>
                                <td>{{ $student['firstname'] }}</td>
                                <td>{{ $student['branchcode'] }}</td>
                                <td>{{ $student['categorycode'] }}</td>
                                <td>{{ $student['status'] }}</td>

                                 <td >
                                     <a href="/editcollege/{{$student->borrowernumber}}" title="EDIT"><i style ="color:green;" class="fa-solid fa-pen"></i></a>
                                     {{-- <a href="/view/{{$student->borrowernumber}}"><i class="fa-solid fa-user"></i></a>  --}}
                                     <a href="{{ route('borrowers.deactivate', $student->borrowernumber) }}" title="DEACTIVATE MAM WENA WAG MONG PINDUTIN PLEASE">   <i style="color: red;" class="fa-solid fa-trash-can"></i></a>

                                     {{-- <form action="/delete/{{ $student->borrowernumber }}" method="POST" style="display: inline-block; margin-right: 5px;">
                                         @csrf
                                         @method('DELETE')
                                         <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer;">
                                             <i style="color: red;" class="fa-solid fa-trash-can"></i>
                                         </button>
                                     </form> --}}
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



<!--ENG -->
<div class="container  mb-5  ">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-lg rounded-lg ">
                <div class="card-header text-center">
                    <h2>BACHELOR IN SECONDARY EDUCATION (ENGLISH)

                    </h2>
                </div>
                <div class="card-body">
                    <table id="ENG" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                             <th>ID</th>
                               <th>cardnumber</th>
                                <th>surname</th>
                                <th>firstname</th>
                                <th>branchcode</th>
                                <th>category code</th>
                                <th>status</th>
                                <th>Action</th>

                                {{-- <th>Action</th> -- --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ENG as $student)
                            <tr>
                             <td>{{ $student['borrowernumber'] }}</td>
                              <td>{{ $student['cardnumber'] }}</td>
                                <td>{{ $student['surname'] }}</td>
                                <td>{{ $student['firstname'] }}</td>
                                <td>{{ $student['branchcode'] }}</td>
                                <td>{{ $student['categorycode'] }}</td>
                                <td>{{ $student['status'] }}</td>

                                 <td >
                                     <a href="/editcollege/{{$student->borrowernumber}}" title="EDIT"><i style ="color:green;" class="fa-solid fa-pen"></i></a>
                                     {{-- <a href="/view/{{$student->borrowernumber}}"><i class="fa-solid fa-user"></i></a>  --}}
                                     <a href="{{ route('borrowers.deactivate', $student->borrowernumber) }}" title="DEACTIVATE MAM WENA WAG MONG PINDUTIN PLEASE">   <i style="color: red;" class="fa-solid fa-trash-can"></i></a>

                                     {{-- <form action="/delete/{{ $student->borrowernumber }}" method="POST" style="display: inline-block; margin-right: 5px;">
                                         @csrf
                                         @method('DELETE')
                                         <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer;">
                                             <i style="color: red;" class="fa-solid fa-trash-can"></i>
                                         </button>
                                     </form> --}}
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

<!--MATH -->
<div class="container  mb-5  ">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-lg rounded-lg ">
                <div class="card-header text-center">
                    <h2>BACHELOR IN SECONDARY EDUCATION (MATH)

                    </h2>
                </div>
                <div class="card-body">
                    <table id="MATH" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                             <th>ID</th>
                               <th>cardnumber</th>
                                <th>surname</th>
                                <th>firstname</th>
                                <th>branchcode</th>
                                <th>category code</th>
                                <th>status</th>
                                <th>Action</th>

                                {{-- <th>Action</th> -- --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($MATH as $student)
                            <tr>
                             <td>{{ $student['borrowernumber'] }}</td>
                              <td>{{ $student['cardnumber'] }}</td>
                                <td>{{ $student['surname'] }}</td>
                                <td>{{ $student['firstname'] }}</td>
                                <td>{{ $student['branchcode'] }}</td>
                                <td>{{ $student['categorycode'] }}</td>
                                <td>{{ $student['status'] }}</td>

                                 <td >
                                     <a href="/editcollege/{{$student->borrowernumber}}" title="EDIT"><i style ="color:green;" class="fa-solid fa-pen"></i></a>
                                     {{-- <a href="/view/{{$student->borrowernumber}}"><i class="fa-solid fa-user"></i></a>  --}}
                                     <a href="{{ route('borrowers.deactivate', $student->borrowernumber) }}" title="DEACTIVATE MAM WENA WAG MONG PINDUTIN PLEASE">   <i style="color: red;" class="fa-solid fa-trash-can"></i></a>

                                     {{-- <form action="/delete/{{ $student->borrowernumber }}" method="POST" style="display: inline-block; margin-right: 5px;">
                                         @csrf
                                         @method('DELETE')
                                         <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer;">
                                             <i style="color: red;" class="fa-solid fa-trash-can"></i>
                                         </button>
                                     </form> --}}
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



<!--ENTREP -->
<div class="container  mb-5  ">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-lg rounded-lg ">
                <div class="card-header text-center">
                    <h2>BACHELOR IN SCIENCE IN ENTREPRENEURSHIP

                    </h2>
                </div>
                <div class="card-body">
                    <table id="ENTREP" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                             <th>ID</th>
                               <th>cardnumber</th>
                                <th>surname</th>
                                <th>firstname</th>
                                <th>branchcode</th>
                                <th>category code</th>
                                <th>status</th>
                                <th>Action</th>

                                {{-- <th>Action</th> -- --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ENTREP as $student)
                            <tr>
                             <td>{{ $student['borrowernumber'] }}</td>
                              <td>{{ $student['cardnumber'] }}</td>
                                <td>{{ $student['surname'] }}</td>
                                <td>{{ $student['firstname'] }}</td>
                                <td>{{ $student['branchcode'] }}</td>
                                <td>{{ $student['categorycode'] }}</td>
                                <td>{{ $student['status'] }}</td>

                                 <td >
                                     <a href="/editcollege/{{$student->borrowernumber}}" title="EDIT"><i style ="color:green;" class="fa-solid fa-pen"></i></a>
                                     {{-- <a href="/view/{{$student->borrowernumber}}"><i class="fa-solid fa-user"></i></a>  --}}
                                     <a href="{{ route('borrowers.deactivate', $student->borrowernumber) }}" title="DEACTIVATE MAM WENA WAG MONG PINDUTIN PLEASE">   <i style="color: red;" class="fa-solid fa-trash-can"></i></a>

                                     {{-- <form action="/delete/{{ $student->borrowernumber }}" method="POST" style="display: inline-block; margin-right: 5px;">
                                         @csrf
                                         @method('DELETE')
                                         <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer;">
                                             <i style="color: red;" class="fa-solid fa-trash-can"></i>
                                         </button>
                                     </form> --}}
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



<!--BSHM -->
<div class="container  mb-5  ">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-lg rounded-lg ">
                <div class="card-header text-center">
                    <h2>BACHELOR OF SCIENCE IN HOSPITALITY MANAGEMENT

                    </h2>
                </div>
                <div class="card-body">
                    <table id="BSHM" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                             <th>ID</th>
                               <th>cardnumber</th>
                                <th>surname</th>
                                <th>firstname</th>
                                <th>branchcode</th>
                                <th>category code</th>
                                <th>status</th>
                                <th>Action</th>

                                {{-- <th>Action</th> -- --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($BSHM as $student)
                            <tr>
                             <td>{{ $student['borrowernumber'] }}</td>
                              <td>{{ $student['cardnumber'] }}</td>
                                <td>{{ $student['surname'] }}</td>
                                <td>{{ $student['firstname'] }}</td>
                                <td>{{ $student['branchcode'] }}</td>
                                <td>{{ $student['categorycode'] }}</td>
                                <td>{{ $student['status'] }}</td>

                                 <td >
                                     <a href="/editcollege/{{$student->borrowernumber}}" title="EDIT"><i style ="color:green;" class="fa-solid fa-pen"></i></a>
                                     {{-- <a href="/view/{{$student->borrowernumber}}"><i class="fa-solid fa-user"></i></a>  --}}
                                     <a href="{{ route('borrowers.deactivate', $student->borrowernumber) }}" title="DEACTIVATE MAM WENA WAG MONG PINDUTIN PLEASE">   <i style="color: red;" class="fa-solid fa-trash-can"></i></a>

                                     {{-- <form action="/delete/{{ $student->borrowernumber }}" method="POST" style="display: inline-block; margin-right: 5px;">
                                         @csrf
                                         @method('DELETE')
                                         <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer;">
                                             <i style="color: red;" class="fa-solid fa-trash-can"></i>
                                         </button>
                                     </form> --}}
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


<!--BSTM -->
<div class="container  mb-5  ">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-lg rounded-lg ">
                <div class="card-header text-center">
                    <h2>BACHELOR OF SCIENCE IN TOURISM MANAGEMENT

                    </h2>
                </div>
                <div class="card-body">
                    <table id="BSTM" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                             <th>ID</th>
                               <th>cardnumber</th>
                                <th>surname</th>
                                <th>firstname</th>
                                <th>branchcode</th>
                                <th>category code</th>
                                <th>status</th>
                                <th>Action</th>

                                {{-- <th>Action</th> -- --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($BSTM as $student)
                            <tr>
                             <td>{{ $student['borrowernumber'] }}</td>
                              <td>{{ $student['cardnumber'] }}</td>
                                <td>{{ $student['surname'] }}</td>
                                <td>{{ $student['firstname'] }}</td>
                                <td>{{ $student['branchcode'] }}</td>
                                <td>{{ $student['categorycode'] }}</td>
                                <td>{{ $student['status'] }}</td>

                                 <td >
                                     <a href="/editcollege/{{$student->borrowernumber}}" title="EDIT"><i style ="color:green;" class="fa-solid fa-pen"></i></a>
                                     {{-- <a href="/view/{{$student->borrowernumber}}"><i class="fa-solid fa-user"></i></a>  --}}
                                     <a href="{{ route('borrowers.deactivate', $student->borrowernumber) }}" title="DEACTIVATE MAM WENA WAG MONG PINDUTIN PLEASE">   <i style="color: red;" class="fa-solid fa-trash-can"></i></a>

                                     {{-- <form action="/delete/{{ $student->borrowernumber }}" method="POST" style="display: inline-block; margin-right: 5px;">
                                         @csrf
                                         @method('DELETE')
                                         <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer;">
                                             <i style="color: red;" class="fa-solid fa-trash-can"></i>
                                         </button>
                                     </form> --}}
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
   </x-layout>
