<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('style.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" type="image/png" href="{{ asset('olopsc_logo.png') }}">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
    #font {
      font-family: 'Montserrat', sans-serif;
    }
  </style>
</head>
<body>

<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">

            <h1 class="mb-4 pb-2 pb-md-0 mb-md-5" id="font">Registration Form</h1>
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5" id="font">Grade School Learning Resource Center</h3>

            <form action="/register" method="POST" enctype="multipart/form-data">
              @csrf

              <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <label class="form-label" for="firstName" id="font">First Name</label>
                    <input type="text" id="firstName" name="firstname" class="form-control form-control-lg" />
                    @error('firstname')
                    <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                    @enderror
                  </div>
                </div>

                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <label class="form-label" for="surname" id="font">Last Name</label>
                    <input type="text" name="surname" id="surname" class="form-control form-control-lg" />
                    @error('surname')
                    <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <label class="form-label" id="font">Student Number</label>
                    <input type="text" name="cardnumber" class="form-control form-control-lg" />
                    @error('cardnumber')
                    <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                    @enderror
                  </div>
                </div>


                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <label class="form-label" id="font">Grade Level</label>
                    <select name="categorycode" id="categorycode" class="form-control form-control-lg">
                      <option disabled selected>Choose option</option>
                      <option value="NTP">Non-Teaching Personnel</option>
                      <option value="FAC">Faculty</option>
                      <option value="GST01">Grade 1</option>
                      <option value="GST02">Grade 2</option>
                      <option value="GST03">Grade 3</option>
                      <option value="GST04">Grade 4</option>
                      <option value="GST05">Grade 5</option>
                      <option value="GST06">Grade 6</option>
                    </select>
                    @error('categorycode')
                    <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
              </div>
               <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <label class="form-label" id="font" for="sort1">Section</label>
                    <select name="sort1" id="sort1" class="form-control form-control-lg">
                      <option disabled selected>Choose option</option>
                    </select>
                    @error('sort1')
                    <p class="m-0 small alert alert-danger shadow-sm" id="font">{{ $message }}</p>
                    @enderror
                  </div>
                </div>

                 <div class="mb-3">
                    <input type="file" name="avatar" >
                    @error('avatar')
                        <p class="alert small alert-danger shadow-sm">{{$message}}</p>
                    @enderror
                </div>

              {{-- <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <label class="form-label" id="font">Section</label>
                    <select name="categorycode" class="form-control form-control-lg">
                      <option disabled selected>Choose option</option>
                      <option value="GST01">Grade 1</option>
                      <option value="GST02">Grade 2</option>
                      <option value="GST03">Grade 3</option>
                      <option value="GST04">Grade 4</option>
                      <option value="GST05">Grade 5</option>
                      <option value="GST06">Grade 6</option>
                    </select>
                    @error('categorycode')
                    <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
              </div> --}}

              <input type="hidden" name="branchcode" value="GSLRC">
              <input type="hidden" name="dateenrolled" value="{{ date('Y-m-d') }}">
              <input type="hidden" name="status" value="active">

              <div class="mt-4 pt-2">
                <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
                <a class="btn btn-danger btn-lg" href="/1">BACK</a>
              </div>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  const sectionOptions = {
        FAC: ['Faculty'],
    NTP: ['Non-Teaching Personnel'],
     GST01: [
        '1-Trustful', '1-Truthful', '1-Prayerful', '1-Grateful',
        '1-Industrious', '1-Noble', '1-Polite'
      ],
      GST02: [
        '2-Admirable', '2-Faithful', '2-Obedient', '2-Chaste',
        '2-Merciful', '2-Precious', '2-Amiable'
      ],
      GST03: [
        '3-Nativity', '3-Annunciation', '3-Assumption',
        '3-Epiphany', '3-Incarnation', '3-Glorious'
      ],
      GST04: [
        '4-Salvation', '4-Dedication', '4-Adoration',
        '4-Transfiguration', '4-Justification', '4-Reconciliation'
      ],
      GST05: [
        '5-Pillar of Trust', '5-Vessel of Devotion', '5-Vessel of Honor',
        '5-Divine Grace', '5-Bond of Love', '5-Seat of Wisdom'
      ],
      GST06: [
        '6-Queen of Queens', '6-Queen of Peace', '6-Queen of Martyrs',
        '6-Queen of Apostles', '6-Queen of Angels', '6-Queen of Virgins'
      ],

  };

  document.addEventListener('DOMContentLoaded', function () {
    const gradeSelect = document.getElementById('categorycode');
    const sectionSelect = document.getElementById('sort1');

    gradeSelect.addEventListener('change', function () {
      const selectedGrade = this.value;

      // Clear previous options
      sectionSelect.innerHTML = '<option disabled selected>Choose option</option>';

      if (sectionOptions[selectedGrade]) {
        sectionOptions[selectedGrade].forEach(section => {
          const option = document.createElement('option');
          option.value = section;
          option.textContent = section;
          sectionSelect.appendChild(option);
        });
      }
    });
  });
</script>
</body>
</html>
