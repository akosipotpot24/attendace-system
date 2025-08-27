<x-layout>

<form action="/editstudent/{{$student->borrowernumber}}" method="POST" enctype="multipart/form-data">
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
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card shadow">
     <div class="card-header clearfix">
  <h3 class="mb-0 text-center">UPDATE STUDENT
    <a href="{{ url()->previous() }}" class="btn btn-danger btn-sm float-end">Back</a>
  </h3>

</div>

        <div class="card-body">
         <div class="">
          Note: Please make sure to fill out
          <br>
          the entire form before proceeding!
         </div>
      


          <div class="text-center mb-4">
            {{-- <img id="avatarPreview" src="{{ Storage::url('avatars/' . $student->avatar) }}"
                 alt="avatar" width="200" height="200" class="rounded-circle border shadow-sm"> --}}
                    @if($student->avatar)
                       <img src="{{ Storage::url('avatars/' . $student->avatar) }}" alt="avatar" width="200" height="200" class="rounded-circle border shadow-sm">
                    @else
                       <img src="{{ asset('storage/avatars/default.jpg') }}" alt="avatar" width="200" height="200" class="rounded-circle border shadow-sm">
                    @endif
            <p class="text-muted mt-2 mb-0 small">Patron Avatar</p>
          </div>

          <div class="row g-4">
            <div class="col-lg-4">
              <input type="hidden" name="borrowernumber" value="{{$student->borrowernumber}}">
              <label for="cardnumber">Student Number:</label>
              <input type="text" name="cardnumber" class="form-control" id="cardnumber" value="{{$student->cardnumber}}">
            </div>

            <div class="col-lg-4">
              <label for="surname">Surname:</label>
              <input type="text" name="surname" class="form-control" id="surname" value="{{$student->surname}}">
            </div>

            <div class="col-lg-4">
              <label for="firstname">First Name:</label>
              <input type="text" name="firstname" class="form-control" id="firstname" value="{{$student->firstname}}">
            </div>

            <div class="col-lg-4">
              <label for="branchcode">Branch Code:</label>
              <select name="branchcode" id="branchcode" class="form-control">
                <option value="GSLRC" {{ $student->branchcode == 'GSLRC' ? 'selected' : '' }}>Gradeschool Library</option>
                <option value="HSLRC" {{ $student->branchcode == 'HSLRC' ? 'selected' : '' }}>High School Library</option>
                <option value="CLLRC" {{ $student->branchcode == 'CLLRC' ? 'selected' : '' }}>College Library</option>
              </select>
            </div>

            <div class="col-lg-4">
              <label for="categorycode">Grade Level Code:</label>
              <select name="categorycode" id="categorycode" class="form-control">
                <option disabled selected>Choose option</option>
              </select>
            </div>

            <div class="col-lg-4">
              <label for="sort1">Section:</label>
              <select name="sort1" id="sort1" class="form-control">
                <option disabled selected>Choose option</option>
              </select>
            </div>

            <div class="col-lg-6 mb-3">
              <label for="avatar">Upload New Avatar:</label>
              <input type="file" name="avatar" id="avatar" accept="image/*" onchange="previewAvatar(this)">
              @error('avatar')
                <p class="alert small alert-danger shadow-sm mt-1">{{ $message }}</p>
              @enderror
            </div>

            <div class="col-lg-2 d-flex align-items-end justify-content-center mt-4 mb-3">
              <button class="btn btn-success w-100">Submit</button>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>
</div>
</form>

<script>
  const gradeLevels = {
    GSLRC: {
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
    },
    HSLRC: {
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
    },
    CLLRC: {
      FAC: ['Faculty'],
      NTP: ['Non-Teaching Personnel'],
      BSCS: ['BSCS 1A', 'BSCS 1B', 'BSCS 2A', 'BSCS 3A', 'BSCS 4A'],
      "AB-ENG": ['AB-ENG 1A', 'AB-ENG 1B', 'AB-ENG 2A', 'AB-ENG 3A', 'AB-ENG 4A'],
    }
  };

  // NEW: Label mapping for grades
  const gradeLabels = {
    GST01: 'Grade 1',
    GST02: 'Grade 2',
    GST03: 'Grade 3',
    GST04: 'Grade 4',
    GST05: 'Grade 5',
    GST06: 'Grade 6',
    HST01: 'Grade 7',
    HST02: 'Grade 8',
    HST03: 'Grade 9',
    HST04: 'Grade 10',
    HST05: 'Grade 11',
    HST06: 'Grade 12',
    FAC: 'Faculty',
    NTP: 'Non-Teaching Personnel',
    BSCS: 'BSCS',
    "AB-ENG": 'AB-ENG'
  };

  document.addEventListener('DOMContentLoaded', function () {
    const branchSelect = document.getElementById('branchcode');
    const gradeSelect = document.getElementById('categorycode');
    const sectionSelect = document.getElementById('sort1');

    function populateGrades(branchCode) {
      gradeSelect.innerHTML = '<option disabled selected>Choose option</option>';
      sectionSelect.innerHTML = '<option disabled selected>Choose option</option>';

      if (gradeLevels[branchCode]) {
        for (const grade in gradeLevels[branchCode]) {
          const option = document.createElement('option');
          option.value = grade;
          option.textContent = gradeLabels[grade] || grade;
          gradeSelect.appendChild(option);
        }
      }
    }

    function populateSections(grade) {
      const branchCode = branchSelect.value;
      sectionSelect.innerHTML = '<option disabled selected>Choose option</option>';

      if (gradeLevels[branchCode] && gradeLevels[branchCode][grade]) {
        gradeLevels[branchCode][grade].forEach(section => {
          const option = document.createElement('option');
          option.value = section;
          option.textContent = section;
          sectionSelect.appendChild(option);
        });
      }
    }

    branchSelect.addEventListener('change', function () {
      populateGrades(this.value);
    });

    gradeSelect.addEventListener('change', function () {
      populateSections(this.value);
    });

    const currentBranch = branchSelect.value;
    const currentGrade = "{{$student->categorycode}}";
    const currentSection = "{{$student->sort1}}";

    populateGrades(currentBranch);
    gradeSelect.value = currentGrade;
    populateSections(currentGrade);
    sectionSelect.value = currentSection;
  });

  function previewAvatar(input) {
    const preview = document.getElementById('avatarPreview');
    const file = input.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function (e) {
        preview.src = e.target.result;
      };
      reader.readAsDataURL(file);
    }
  }
</script>

</x-layout>
