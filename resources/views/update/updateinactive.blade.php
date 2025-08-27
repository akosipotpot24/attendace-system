<x-layout>


<form action="/editinactive1/{{$student->borrowernumber}}" method="POST">
@csrf
@method('PUT')
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
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> UPDATE STUDENTS  <a href="/inactiveStudents" class="btn btn-danger float-end">Back</a> </div>



            <div class="row mb-5" style="margin:0 auto; max-width:90%;">
                <div class="col-lg-4">
                    <input type="hidden" name="borrowernumber" value="{{$student->borrowernumber}}">
                    <label for="">Student Number:</label>
                    <input type="text" name="cardnumber" class="form-control" value="{{$student->cardnumber}}">
                </div>


                <div class="col-lg-4">
                    <label for="">Surname:</label>
                    <input type="text" name="surname" class="form-control" value="{{$student->surname}}">
                </div>
                <div class="col-lg-4">
                    <label for="">First name:</label>
                    <input type="text" name="firstname" class="form-control" value="{{$student->firstname}}">
                </div>
                <div class="col-lg-4">
                    <label for="">Library Location:</label>
                    <input type="text" name="sort1" class="form-control" value="{{$student->sort1}}">
                </div>

               <div class="col-lg-4">
                    <label for="categorycode">Section:</label>
                    <select name="categorycode" id="categorycode" class="form-control">


                        <option value="NTP" {{ $student->categorycode == 'NTP' ? 'selected' : '' }}>Non Teaching Personnel (Faculty)</option>
                        <option value="FAC" {{ $student->categorycode == 'FAC' ? 'selected' : '' }}>FAC (Faculty)</option>
                        <option value="GST01" {{ $student->categorycode == 'GST01' ? 'selected' : '' }}>GST01</option>
                        <option value="GST02" {{ $student->categorycode == 'GST02' ? 'selected' : '' }}>GST02</option>
                        <option value="GST03" {{ $student->categorycode == 'GST03' ? 'selected' : '' }}>GST03</option>
                        <option value="GST04" {{ $student->categorycode == 'GST04' ? 'selected' : '' }}>GST04</option>
                        <option value="GST05" {{ $student->categorycode == 'GST05' ? 'selected' : '' }}>GST05</option>
                        <option value="GST06" {{ $student->categorycode == 'GST06' ? 'selected' : '' }}>GST06</option>
                        <option value="HST01" {{ $student->categorycode == 'HST01' ? 'selected' : '' }}>HST01</option>
                        <option value="HST02" {{ $student->categorycode == 'HST02' ? 'selected' : '' }}>HST02</option>
                        <option value="HST03" {{ $student->categorycode == 'HST03' ? 'selected' : '' }}>HST03</option>
                        <option value="HST04" {{ $student->categorycode == 'HST04' ? 'selected' : '' }}>HST04</option>
                        <option value="HST05" {{ $student->categorycode == 'HST05' ? 'selected' : '' }}>HST05</option>
                        <option value="HST06" {{ $student->categorycode == 'HST06' ? 'selected' : '' }}>HST06</option>

                    </select>
                </div>

                <div class="col-lg-2 d-flex align-items-end justify-content-center">
                    <button class="mt-4 btn btn-success">Submit</button>
                </div>
            </div>

        </div>
        </div>
    </div>
</div>
</form>
</x-layout>
