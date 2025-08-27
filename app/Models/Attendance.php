<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;


    protected $fillable = [
        'student_number',
        'student_name',
        'library_location',
        'attendance_date',
        'grade_level',
        'scanned_at',
        'status'
    ];
}
