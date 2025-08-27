<x-layout>
    <div class="container mt-5 mb-5">
        <div class="mr-3 col-lg-4" >
           
             <select name="UserType" class="form-control form-control-sm input-dark " required  
             
                onchange="if(this.value) window.location.href=this.value;">
                <option value="" disabled selected>Students</option>
                <option value="{{ url('/gradeschool') }}">Grade School Students</option>
                <option value="{{ url('/highschool') }}">High School Students</option>
                <option value="{{ url('/college') }}">College Students</option>
                
            </select>
        
        </div>
     </div>


        <div class="container  mb-5  ">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-lg rounded-lg ">
                <div class="card-header text-center"> 
                    <h2>GRADE LEVEL CODE
                       
                    </h2>
                </div>
                <div class="card-body">
                    <table  class="table table-bordered table-striped">
                        <thead>
                            <tr>
                               <th>Grade Level</th>
                                <th>Grade level Code</th>
                              
                                

                                {{-- <th>Action</th> -- --}}
                            </tr>
                        </thead>
                        <tbody>
                           
                            <tr>
                                <td>GRADE 1</td>
                                <td><strong>GSTO1</strong></td>
                           </tr>
                           <tr>
                                <td>GRADE 2</td>
                                <td><strong>GSTO2</strong></td>
                           </tr>
                          <tr>
                                <td>GRADE 3</td>
                                <td><strong>GSTO3</strong></td>
                           </tr>
                           <tr>
                                <td>GRADE 4</td>
                                <td><strong>GSTO4</strong></td>
                           </tr>
                           <tr>
                                <td>GRADE 5</td>
                                <td><strong>GSTO5</strong></td>
                           </tr>
                           <tr>
                                <td>GRADE 6</td>
                                <td><strong>GSTO6</strong></td>
                           </tr>
                           <tr>
                                <td>GRADE 7</td>
                                <td><strong>HSTO1</strong></td>
                           </tr>
                           <tr>
                                <td>GRADE 8</td>
                                <td><strong>HSTO2</strong></td>
                           </tr>
                            <tr>
                                <td>GRADE 9</td>
                                <td><strong>HSTO3</strong></td>
                           </tr>
                           <tr>
                                <td>GRADE 10</td>
                                <td><strong>HSTO4</strong></td>
                           </tr>
                            <tr>
                                <td>GRADE 11</td>
                                <td><strong>HSTO5</strong></td>
                           </tr>
                           <tr>
                                <td>GRADE 12</td>
                                <td><strong>HSTO6</strong></td>
                           </tr>
                           <tr>
                                <td>COLLEGE</td>
                                <td><strong>Depends on the program (ex. BSCS, BSHM, BSTM)</strong></td>
                           </tr>
                     
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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
                    <h2>INACTIVE STUDENTS
                       
                    </h2>
                </div>
                <div class="card-body">
                    <table id="mytable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                               <th>Student Number</th>
                                <th>Last Name</th>
                                <th>First Name</th>
                                <th>Library Location Code</th> 
                                <th>GRADE LEVEL CODE</th>
                                <th>Section</th>
                                <th>Action</th>

                                {{-- <th>Action</th> -- --}}
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
                               
                                <td >
                                    <a href="/editinactive/{{$student->borrowernumber}}" title="EDIT"><i style ="color:green;" class="fa-solid fa-pen"></i></a>
                                  
                                    {{-- <a href="/edit/{{$student->borrowernumber}}" title="EDIT"><i style ="color:green;" class="fa-solid fa-pen"></i></a> --}}
                                    <a href="{{ route('borrowers.activate', $student->borrowernumber) }}" title="Restore student">   <i class="fa-solid fa-circle-check"></i></a> 
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