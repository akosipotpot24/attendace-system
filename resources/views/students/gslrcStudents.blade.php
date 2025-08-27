<x-layout>
    <div class="container mt-5 mb-5">
        <div class="mr-3 col-lg-4">
            <select name="UserType" class="form-control form-control-sm input-dark" required
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

    @php
        $gradeSections = [
            'GRADE 1' => $GST01,
            'GRADE 2' => $GST02,
            'GRADE 3' => $GST03,
            'GRADE 4' => $GST04,
            'GRADE 5' => $GST05,
            'GRADE 6' => $GST06,
        ];
        $tableIds = ['GST01', 'GST02', 'GST03', 'GST04', 'GST05', 'GST06'];
        $i = 0;
    @endphp

    @foreach($gradeSections as $grade => $students)
    <div class="container mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-lg rounded-lg">
                    <div class="card-header text-center">
                        <h2>{{ $grade }} GRADE SCHOOL STUDENTS</h2>
                    </div>
                    <div class="card-body">
                        <table id="{{ $tableIds[$i++] }}" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>cardnumber</th>
                                    <th>surname</th>
                                    <th>firstname</th>
                                    <th>branchcode</th>
                                    <th>category code</th>
                                    <th>Sort1</th>
                                    <th>avatar</th>
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
                                            <img src="{{ Storage::url('avatars/' . $student['avatar']) }}" alt="avatar" width="50" height="50">
                                        @else
                                            <img src="{{ asset('avatars/default.jpg') }}" alt="default avatar" width="50" height="50">
                                        @endif
                                    </td>
                                    <td>
                                        <a href="/edit/{{ $student->borrowernumber }}" title="EDIT">
                                            <i style="color:green;" class="fa-solid fa-pen"></i>
                                        </a>
                                        <a href="{{ route('borrowers.deactivate', $student->borrowernumber) }}"
                                            title="DEACTIVATE MAM WENA WAG MONG PINDUTIN PLEASE">
                                            <i style="color:red;" class="fa-solid fa-trash-can"></i>
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
    @endforeach
</x-layout>
