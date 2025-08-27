<x-layout>

   <form action="/stats_result">

    @csrf
    <div class="container mb-5 mt-3">
        <div class="row">

            <div class="col-md-4" >
                <label for="">Select Library</label>
                <select name="library" class="form-control form-control input-dark ">
                    <option value="" disabled selected></option>
                    <option value="Preschool Learning Resource Center">PreSchool Learning Resource Center</option>
                    <option value="Grade School Learning Resource Center">Grade Learning Resource Center</option>
                    <option value="High School Learning Resource Center">High School Learning Resource Center</option>
                    <option value="College Learning Resource Center">College Learning Resource Center</option>
                </select>
            </div>

            <div class="col-md-4">
                <label for="start_date">Start Date:</label>
                <input type="date" name="start_date" id="start_date" class="form-control" placeholder="YYYY-MM-DD">
            </div>
            <div class="col-md-4">
                <label for="end_date">End Date:</label>
                <input type="date" name="end_date" id="end_date" class="form-control" placeholder="YYYY-MM-DD">
            </div>
            <div class="col-md-4 mt-4" >
                <button class="btn btn-success">ENTER</button>
            </div>
        </div>
    </div>
   </form>
    

</x-layout>