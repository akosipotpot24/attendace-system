<x-layout>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center"><h1>Section list</h1>  </div>
                    <i class="fa-solid fa-image"></i>

                    <div class="card-body">
                          <table id="mytable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                               <th>Student Number</th>
                                <th>Last Name</th>
                                <
                                <th>Action</th>

                                {{-- <th>Action</th> -- --}}
                            </tr>
                        </thead>
                        <tbody>
                        {{--  @foreach($students as $student) --}}
                            <tr>
                              <td></td>
                                <td>{{ $student['surname'] }}</td>
                                <td>{{ $student['firstname'] }}</td>
                            
                               
                                <td >
                                    {{-- <a href="/editinactive/{{$student->borrowernumber}}" title="EDIT"><i style ="color:green;" class="fa-solid fa-pen"></i></a>
                                  
                                     <a href="/edit/{{$student->borrowernumber}}" title="EDIT"><i style ="color:green;" class="fa-solid fa-pen"></i></a> --}}
                                    <a href="{{ route('borrowers.activate', $student->borrowernumber) }}" title="Restore student">   <i class="fa-solid fa-circle-check"></i></a> 
                                --}}
                                </td> 

                            </tr>
                         {{-- @endforeach --}}
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>