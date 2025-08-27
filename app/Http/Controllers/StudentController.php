<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Borrower;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;


class StudentController extends Controller
{
    //
    public function deactivate($student) {
       $values = Borrower::findOrFail($student);
       $values->status ='inactive';
       $values->save();

        return redirect()->back()->with('failure', 'Student deactivated successfully.');
    }
    //
    public function activate($student) {
        $values = Borrower::findOrFail($student);
        $values->status ='active';
        $values->save();

         return redirect()->back()->with('success', 'Student activated successfully.');
     }


    public function delete(Borrower $student){
        $student->delete();
        return redirect('/')->with('success','Patron successfully remove');
    }



    //edit controllers
public function edit1(Request $request, $borrowernumber)
{
    // Get the student or fail
    $student = Borrower::where('borrowernumber', $borrowernumber)->firstOrFail();

    // Validate input
    $values = $request->validate([
        'cardnumber'   => 'required|string',
        'surname'      => 'required|string',
        'firstname'    => 'required|string',
        'branchcode'   => 'required|string',
        'sort1'        => 'required|string',
        'categorycode' => 'nullable|string',
        'avatar'       => 'nullable|image|max:8000' // optional
    ]);

    // Check if a new avatar is uploaded
    if ($request->hasFile('avatar')) {

        // Make sure avatars folder exists
        Storage::disk('public')->makeDirectory('avatars');

        // Generate unique filename
        $filename = $values['cardnumber'] . '-' . uniqid() . '.jpg';

        // Process image
        $manager = new ImageManager(new Driver());
        $image   = $manager->read($request->file('avatar'));
        $imgData = $image->cover(800, 800)->toJpeg()->toString(); // ✅ FIXED

        // Save new avatar
        Storage::disk('public')->put('avatars/' . $filename, $imgData);

        // Delete old avatar if exists & not default
        if ($student->avatar && !in_array($student->avatar, ['default.jpg', 'default.jpeg'])) {
            $oldPath = 'avatars/' . $student->avatar;
            if (Storage::disk('public')->exists($oldPath)) {
                Storage::disk('public')->delete($oldPath);
            }
        }

        // Set new avatar in update array
        $values['avatar'] = $filename;
    } else {
        // Keep old avatar if no new one uploaded
        unset($values['avatar']);
    }

    // Update student record
    $student->update($values);

    return redirect()->back()->with('success', $student->firstname . ' updated successfully.');
}


     public function editinactive1(Request $request, $borrowernumber)
    {
        $student = Borrower::where('borrowernumber', $borrowernumber)->firstOrFail();


        $values = $request->validate([
            'cardnumber' => 'required|string',
            'surname' => 'required|string',
            'firstname' => 'required|string',
            'categorycode' => 'nullable|string',

        ]);

        // Update fields
        $student->update($values);

        return redirect('/inactiveStudents')->with('success', $student['firstname'].' '. $student['surname'].' '.'updated successfully!');
    }


      public function editcollege1(Request $request, $borrowernumber)
    {
        echo 'hello tite';
    }



    public function edit($borrowernumber){
        $student = Borrower::where('borrowernumber', $borrowernumber)->firstOrFail();
        return view('update/update', compact('student'));
    }
      public function editinactive($borrowernumber){
        $student = Borrower::where('borrowernumber', $borrowernumber)->firstOrFail();
        return view('update/updateinactive', compact('student'));
    }
     public function editcollege($borrowernumber){
        $student = Borrower::where('borrowernumber', $borrowernumber)->firstOrFail();
        return view('update/updatecollege', compact('student'));
    }


    public function viewStudents(){
        $students = Borrower::where('branchcode','HSLRC')
                            ->where('status','active')
                            ->get();

        $HST01 = Borrower::where('categorycode','HST01')
                            ->where('status','active')
                            ->get();

        $HST02 = Borrower::where('categorycode','HST02')
                            ->where('status','active')
                            ->get();
        $HST03 = Borrower::where('categorycode','HST03')
                            ->where('status','active')
                            ->get();
        $HST04 = Borrower::where('categorycode','HST04')
                            ->where('status','active')
                            ->get();
        $HST05 = Borrower::where('categorycode','HST05')
                            ->where('status','active')
                            ->get();
        $HST06 = Borrower::where('categorycode','HST06')
                            ->where('status','active')
                            ->get();


        return view('/students/hslrcStudents', compact('students', 'HST01', 'HST02', 'HST03', 'HST04', 'HST05', 'HST06'));
    }




    public function viewStudentsCL(){
        $students = Borrower::where('branchcode','CLLRC')
                            ->where('status','active')
                            ->get();
        $ABENG = Borrower::where('categorycode','AB-ENG')
                            ->where('status','active')
                            ->get();
        $ACT = Borrower::where('categorycode','ACT')
                            ->where('status','active')
                            ->get();
        $BEE = Borrower::where('categorycode','BEE')
                            ->where('status','active')
                            ->get();
        $HRD = Borrower::where('categorycode','BSBA-HRD')
                            ->where('status','active')
                            ->get();
        $MM = Borrower::where('categorycode','BSBA-MM')
                            ->where('status','active')
                            ->get();
        $BSCS = Borrower::where('categorycode','BSCS')
                            ->where('status','active')
                            ->get();
        $ENG = Borrower::where('categorycode','BSE-ENG')
                            ->where('status','active')
                            ->get();
        $MATH = Borrower::where('categorycode','BSE-MATH')
                            ->where('status','active')
                            ->get();
        $ENTREP = Borrower::where('categorycode','BS-ENTREP')
                            ->where('status','active')
                            ->get();
        $BSHM = Borrower::where('categorycode','BSHM')
                            ->where('status','active')
                            ->get();
        $BSTM = Borrower::where('categorycode','BSTM')
                            ->where('status','active')
                            ->get();




        return view('/students/cllrcStudents', compact('students','ABENG','ACT','BEE','HRD','MM','BSCS','ENG','MATH','ENTREP','BSHM','BSTM'));
    }

   public function viewStudentsGS(){
        $students = Borrower::where('branchcode','GSLRC')
                            ->where('status','active')
                            ->get();

        $GST01 = Borrower::where('categorycode','GST01')
                            ->where('status','active')
                            ->get();

        $GST02 = Borrower::where('categorycode','GST02')
                            ->where('status','active')
                            ->get();
        $GST03 = Borrower::where('categorycode','GST03')
                            ->where('status','active')
                            ->get();
        $GST04 = Borrower::where('categorycode','GST04')
                            ->where('status','active')
                            ->get();
        $GST05 = Borrower::where('categorycode','GST05')
                            ->where('status','active')
                            ->get();
        $GST06 = Borrower::where('categorycode','GST06')
                            ->where('status','active')
                            ->get();


        return view('/students/gslrcStudents', compact('students', 'GST01', 'GST02', 'GST03', 'GST04', 'GST05', 'GST06'));
    }

     public function viewall(){
        $students = Borrower::where('status','active')
                            ->get();


        return view('/students/allStudents', compact('students'));
    }




    public function viewInactive(){
        $students = Borrower::where('status','inactive')
                            ->get();
        return view('/students/inactive', compact('students'));
    }

        public function register(Request $req){

        $val = $req->validate([
            'firstname'=>'required',
            'surname'=>'required',
            'cardnumber'=>'required',
            'avatar'=>'image|max:5000',
            'categorycode'=>'required',
            'sort1'=> 'required',
            'branchcode'=>'required',
            'dateenrolled'=>'required',
            'status' =>'required'
        ]);

       if ($req->hasFile('avatar')) {
        $filename = $val['cardnumber'] . '-' . uniqid() . '.jpg';
        $manager = new ImageManager(new Driver());
        $image = $manager->read($req->file('avatar'));
        $imgData = $image->cover(800, 800)->toJpeg();
        Storage::disk('public')->put('avatars/' . $filename, $imgData);
    } else {
        $filename = 'default.jpg';
    }

    // ✅ Add avatar filename to data
    $val['avatar'] = $filename;

       Borrower::create($val);
        return redirect()->back()->with('success','Registration for ' . $val['firstname'] .' '. $val['surname'] .' is complete' );
    }






    //highschool
public function scanStudenths(Request $request)
{
    $student = Borrower::where('cardnumber', $request->cardnumber)->first();
    $location1 = "HIGH SCHOOL LEARNING RESOURCE CENTER";

    if ($student) {
        // Fetch last attendance record for today
        $lastAttendance = Attendance::where('student_number', $student->cardnumber)
            ->whereDate('attendance_date', now()->toDateString())
            ->latest()
            ->first();

        // Determine IN/OUT status
        $status = ($lastAttendance && $lastAttendance->status == 'IN') ? 'OUT' : 'IN';

        // Log new attendance entry
        Attendance::create([
            'student_number'    => $student->cardnumber,
            'student_name'      => $student->firstname . ' ' . $student->surname,
            'library_location'  => $location1,
            'attendance_date'   => now()->toDateString(),
            'grade_level'       => $student->categorycode,
            'status'            => $status,
        ]);

        // Build avatar URL
        $avatarUrl = $student->avatar
            ? asset('storage/avatars/' . $student->avatar)
            : null;

        return response()->json([
            'name'        => $student->firstname . ' ' . $student->surname,
            'status'      => $status,
            'student_id'  => $student->cardnumber,
            'avatar'      => $avatarUrl,
            'sort1'       => $student->sort1,
        ]);
    } else {
        return response()->json([
            'name'       => null,
            'status'     => null,
            'student_id' => null,
            'avatar'     => null,
            'sort1'      => null,
        ]);
    }
}


      //gradeschool
      public function scanStudentgs(Request $request)
{
    $student = Borrower::where('cardnumber', $request->cardnumber)->first();
    $location1 = "GRADE SCHOOL LEARNING RESOURCE CENTER";

    if ($student) {
        // Fetch last attendance record for today
        $lastAttendance = Attendance::where('student_number', $student->cardnumber)
            ->whereDate('attendance_date', now()->toDateString())
            ->latest()
            ->first();

        // Determine IN/OUT status
        $status = ($lastAttendance && $lastAttendance->status == 'IN') ? 'OUT' : 'IN';

        // Log new attendance entry
        Attendance::create([
            'student_number'    => $student->cardnumber,
            'student_name'      => $student->firstname . ' ' . $student->surname,
            'library_location'  => $location1,
            'attendance_date'   => now()->toDateString(),
            'grade_level'       => $student->categorycode,
            'status'            => $status,
        ]);

        // Build avatar URL
        $avatarUrl = $student->avatar
            ? asset('storage/avatars/' . $student->avatar)
            : null;

        return response()->json([
            'name'        => $student->firstname . ' ' . $student->surname,
            'status'      => $status,
            'student_id'  => $student->cardnumber,
            'avatar'      => $avatarUrl,
            'sort1'       => $student->sort1,
        ]);
    } else {
        return response()->json([
            'name'       => null,
            'status'     => null,
            'student_id' => null,
            'avatar'     => null,
            'sort1'      => null,
        ]);
    }
}




        //PRESCHOOL
         public function scanStudentps(Request $request)
{
    $student = Borrower::where('cardnumber', $request->cardnumber)->first();
    $location1 = "PRESCHOOL LEARNING RESOURCE CENTER";

    if ($student) {
        // Fetch last attendance record for today
        $lastAttendance = Attendance::where('student_number', $student->cardnumber)
            ->whereDate('attendance_date', now()->toDateString())
            ->latest()
            ->first();

        // Determine IN/OUT status
        $status = ($lastAttendance && $lastAttendance->status == 'IN') ? 'OUT' : 'IN';

        // Log new attendance entry
        Attendance::create([
            'student_number'    => $student->cardnumber,
            'student_name'      => $student->firstname . ' ' . $student->surname,
            'library_location'  => $location1,
            'attendance_date'   => now()->toDateString(),
            'grade_level'       => $student->categorycode,
            'status'            => $status,
        ]);

        // Build avatar URL
        $avatarUrl = $student->avatar
            ? asset('storage/avatars/' . $student->avatar)
            : null;

        return response()->json([
            'name'        => $student->firstname . ' ' . $student->surname,
            'status'      => $status,
            'student_id'  => $student->cardnumber,
            'avatar'      => $avatarUrl,
            'sort1'       => $student->sort1,
        ]);
    } else {
        return response()->json([
            'name'       => null,
            'status'     => null,
            'student_id' => null,
            'avatar'     => null,
            'sort1'      => null,
        ]);
    }
}


  //college
 public function scanStudentcl(Request $request)
{
    $student = Borrower::where('cardnumber', $request->cardnumber)->first();
    $location1 = "COLLEGE LEARNING RESOURCE CENTER";

    if ($student) {
        // Fetch last attendance record for today
        $lastAttendance = Attendance::where('student_number', $student->cardnumber)
            ->whereDate('attendance_date', now()->toDateString())
            ->latest()
            ->first();

        // Determine IN/OUT status
        $status = ($lastAttendance && $lastAttendance->status == 'IN') ? 'OUT' : 'IN';

        // Log new attendance entry
        Attendance::create([
            'student_number'    => $student->cardnumber,
            'student_name'      => $student->firstname . ' ' . $student->surname,
            'library_location'  => $location1,
            'attendance_date'   => now()->toDateString(),
            'grade_level'       => $student->categorycode,
            'status'            => $status,
        ]);

        // Build avatar URL
        $avatarUrl = $student->avatar
            ? asset('storage/avatars/' . $student->avatar)
            : null;

        return response()->json([
            'name'        => $student->firstname . ' ' . $student->surname,
            'status'      => $status,
            'student_id'  => $student->cardnumber,
            'avatar'      => $avatarUrl,
            'sort1'       => $student->sort1,
        ]);
    } else {
        return response()->json([
            'name'       => null,
            'status'     => null,
            'student_id' => null,
            'avatar'     => null,
            'sort1'      => null,
        ]);
    }
}






}
