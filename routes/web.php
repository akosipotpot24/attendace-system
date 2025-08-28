<?php

use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('login');


// begin registration
Route::get('/reg', function () {
    return view('registration/register');
})->middleware('auth');
Route::get('/reghslrc', function () {
    return view('registration/registerHSLRC');
})->middleware('auth');
Route::get('/regcllrc', function () {
    return view('registration/registerCLLRC');
})->middleware('auth');

Route::get('/stats', function () {
    return view('statistics/statistic_date');
})->middleware('auth');


Route::get('/userreg', function () {
    
    return view('registration/UserRegister');
})->middleware('auth');

Route::get('/viewlist', function () {
    
    return view('sections/list');
})->middleware('auth');


Route::get('/createSection', function () {
    
    return view('sections/newsection');
})->middleware('auth');




//viewing students
Route::get('/allstudents', [StudentController::class, 'viewall'])->middleware('auth');
Route::get('/highschool', [StudentController::class, 'viewStudents'])->middleware('auth');

Route::get('/gradeschool', [StudentController::class, 'viewStudentsGS'])->middleware('auth');

Route::get('/college', [StudentController::class, 'viewStudentsCL'])->middleware('auth');
Route::get('/inactiveStudents', [StudentController::class, 'viewInactive'])->middleware('auth');
//viewing students




// end registration

//libraries
Route::get('/1', function () {
    return view('dashboard');
})->middleware('auth');
Route::get('/ps', function () {
    return view('libraries/pslrc');
})->middleware('auth');
Route::get('/gs', function () {
    return view('libraries/gslrc');
})->middleware('auth');
Route::get('/hs', function () {
    return view('libraries/hslrc');
})->middleware('auth');
Route::get('/cl', function () {
    return view('libraries/cllrc');
})->middleware('auth');
//end libraries

//delete
Route::delete('/delete/{student}',[StudentController::class, 'delete']);
Route::get('/deactivate/{student}', [StudentController::class, 'deactivate'])->name('borrowers.deactivate');
Route::get('/activate/{student}', [StudentController::class, 'activate'])->name('borrowers.activate');


//edit
Route::get('/edit/{student}',[StudentController::class, 'edit']);
Route::put('/editstudent/{student}',[StudentController::class, 'edit1']);

Route::get('/editinactive/{student}',[StudentController::class, 'editinactive']);
Route::put('/editinactive1/{student}',[StudentController::class, 'editinactive1']);

Route::get('/editcollege/{student}',[StudentController::class, 'editcollege']);
Route::put('/editcollege1/{student}',[StudentController::class, 'editcollege1']);


//begin logout
Route::get('/login', function () {return view('loginRegister');} );
Route::post('/login',[UserController::class, 'login']);
Route::post('/logout',[UserController::class, 'logout']);
//end logout

//User registration
Route::post('/UserRegister',[UserController::class, 'UserRegister']);
Route::post('/register',[StudentController::class, 'register']);
//end registration


//scan students
Route::post('/scan-studentps', [StudentController::class, 'scanStudentps'])->name('scanStudentps');
Route::post('/scan-studentgs', [StudentController::class, 'scanStudentgs'])->name('scanStudentgs');
Route::post('/scan-studenths', [StudentController::class, 'scanStudenths'])->name('scanStudenths');
Route::post('/scan-studentcl', [StudentController::class, 'scanStudentcl'])->name('scanStudentcl');


Route::get('/statistics', function () {
    return view('statistics/statistic');
})->middleware('auth');


Route::get('/stats_result', function (Request $request) {
    $query = Attendance::where('library_location', $request->library); // Filter records where loc = 'library'

    if ($request->filled('start_date') && $request->filled('end_date')) {
        $query->whereBetween('attendance_date', [$request->start_date, $request->end_date]);
    }

    $values = $query->orderBy('attendance_date', 'asc')->orderBy('created_at', 'asc')->get();
    $count = $values->count(); // Count the number of records

    return view('statistic', ['values' => $values, 'count' => $count]);
});

