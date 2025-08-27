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
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5" id="font">High School Learning Resource Center</h3>

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
                      <option value="HST01">Grade 7</option>
                      <option value="HST02">Grade 8</option>
                      <option value="HST03">Grade 9</option>
                      <option value="HST04">Grade 10</option>
                      <option value="HST05">Grade 11</option>
                      <option value="HST06">Grade 12</option>
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

              <input type="hidden" name="branchcode" value="HSLRC">
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
NTP: ['Non-Teaching Personnel'],
  HST01: [
    '7 - Ark of the Covenant',
    '7 - Gate of Heaven',
    '7 - God ofPeace',
    '7 - Help of the Poor',
    '7 - Mirror of Justice',
    '7 - Mystical Rose'
  ],
  HST02: [
    '8 - Blessed Comforter',
    '8 - Captain of Salvation',
    '8 - Divin Mercy',
    '8 - Good shepperd',
    '8 - Light of the World',
    '8 - Path of Salvation',
    '8 - Lord of Pardon'
  ],
  HST03: [
    '9 - Amazing Grace',
    '9 - Bread of Life',
    '9 - Holy Redeemer',
    '9 - Holy Trinity',
    '9 - Prince of Peace',
    '9 - Wonderful Councelor'
  ],
  HST04: [
    '10 - Assumption of Mary',
    '10 - Coronation of Mary',
    '10 - Legion of mary',
    '10 - Mother of Good Councel',
    '10 - Mother of Mercy',
    '10 - Our Lady of Grace',
    '10 - Solemnity of Mary'
  ],
  HST05: [
    '11 – St. Aloysius',
    '11 – St. Andrew',
    '11 – St. Anthony',
    '11 – St. Augustine',
    '11 – St. Bartholomew',
    '11 – St. Benedict',
    '11 – St. Camillus',
    '11 – St. Charles',
    '11 – St. Gabriel',
    '11 – St. George',
    '11 – St. Gerard',
    '11 – St. Ignatius',
    '11 – St. James',
    '11 – St. John',
    '11 – St. Jerome',
    '11 – St. Luke',
    '11 – St. Mark',
    '11 – St. Matthew',
    '11 – St. Michael',
    '11 – St. Paul',
    '11 – St. Pio',
    '11 – St. Raphael',
    '11 – St. Vincent'
  ],
  HST06: [
    '12 – Aaron',
    '12 – Abraham',
    '12 – Amos',
    '12 – Daniel',
    '12 – David',
    '12 – Elisha',
    '12 – Enoch',
    '12 – Ezekiel',
    '12 – Habakkuk',
    '12 – Hud',
    '12 – Isaiah',
    '12 – Ishamel',
    '12 – Jonah',
    '12 – Joseph',
    '12 – Malachi',
    '12 – Micah',
    '12 – Miriam',
    '12 – Moses',
    '12 – Obadiah',
    '12 – Oded',
    '12 – Shemaiah',
    '12 – Zechariah',
    '12 – Zephaniah'
  ]
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
