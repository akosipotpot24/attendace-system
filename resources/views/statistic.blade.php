<x-statHeader>


        <div class="container py-md-5">
            <div class="row align-items-center">
              <div class="col-lg-7 py-3 py-md-5">
                <a href="/stats">back</a>
                <h3>Good Day! {{ auth()->user()->fullname }} </h3>
              
             
              </div>
              
            </div>
          </div>
        
          <div class="container  mb-5  ">
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow-lg rounded-lg ">
                        <div class="card-header text-center"> 
                            <h2>STUDENTS
                               
                            </h2>
                        </div>
                        <div class="card-body">
                            <table id="mytable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                       <th>student_number</th>
                                        <th>student_name</th>
                                        <th>library_location</th>
                                        <th>grade_level</th>
                                        
                                        {{-- <th>Action</th> -- --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($values as $value)
                                    <tr>
                                      <td>{{ $value['student_number'] }}</td>
                                        <td>{{ $value['student_name'] }}</td>
                                        <td>{{ $value['library_location'] }}</td>
                                        <td>{{ $value['grade_level'] }}</td>
                                        
                                       
                                                {{-- <td>
                                                
                                                <a href="/edit/{{ $value->id }}"><i style="color: green;" class="bx bxs-edit-alt"></i></a>
                                            <a href="/view/{{ $value->id }}"><i class="bx bx-show"></i></a> 
                                                <form action="/delete/{{ $value->id }}" method="POST" style="display: inline-block; margin-right: 5px;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer;">
                                                        <i style="color: red;" class="bx bxs-trash"></i>
                                                    </button>
                                                </form>
                                            </td>  --}}
    
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
          
       
    
    
    
    
    
    </x-statHeader>